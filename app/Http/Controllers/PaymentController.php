<?php

namespace App\Http\Controllers;

use App\Models\AlbumPurchase;
use App\Services\IremboPayService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    protected $iremboPayService;

    public function __construct(IremboPayService $iremboPayService)
    {
        $this->iremboPayService = $iremboPayService;
    }

    /**
     * Initialize IremboPay payment for an album purchase
     */
    public function initializeIremboPay(Request $request, AlbumPurchase $purchase)
    {
        // Verify the purchase exists and is pending
        if ($purchase->payment_status !== 'pending') {
            return redirect()->route('shop.show', $purchase->album)
                ->with('error', 'This purchase has already been processed.');
        }

        try {
            // Create invoice with IremboPay
            $invoiceData = [
                'amount' => $purchase->amount,
                'currency' => config('irembopay.currency'),
                'description' => "Purchase of {$purchase->album->title}",
                'customer_email' => $purchase->customer_email,
                'customer_name' => $purchase->customer_name,
                'customer_phone' => $purchase->customer_phone,
                'reference' => $purchase->download_code, // Use download code as reference
            ];

            $invoice = $this->iremboPayService->createInvoice($invoiceData);

            // Update purchase with invoice details
            $purchase->update([
                'transaction_id' => $invoice['data']['id'] ?? null,
                'payment_details' => [
                    'irembo_invoice_id' => $invoice['data']['id'] ?? null,
                    'irembo_reference' => $invoice['data']['reference'] ?? null,
                    'payment_url' => $invoice['data']['payment_url'] ?? null,
                    'status' => $invoice['data']['status'] ?? 'pending',
                ],
            ]);

            // Redirect to IremboPay payment page
            if (isset($invoice['data']['payment_url'])) {
                return redirect($invoice['data']['payment_url']);
            }

            return redirect()->route('shop.payment.irembopay.form', $purchase)
                ->with('invoice', $invoice);

        } catch (\Exception $e) {
            Log::error('IremboPay payment initialization failed', [
                'purchase_id' => $purchase->id,
                'error' => $e->getMessage()
            ]);

            return redirect()->route('shop.purchase', $purchase->album)
                ->with('error', 'Payment initialization failed. Please try again.');
        }
    }

    /**
     * Show IremboPay payment form (fallback if redirect fails)
     */
    public function showIremboPayForm(AlbumPurchase $purchase)
    {
        if ($purchase->payment_status !== 'pending') {
            return redirect()->route('shop.show', $purchase->album)
                ->with('error', 'This purchase has already been processed.');
        }

        $paymentDetails = $purchase->payment_details ?? [];
        $invoiceId = $paymentDetails['irembo_invoice_id'] ?? null;

        if (!$invoiceId) {
            return redirect()->route('shop.purchase', $purchase->album)
                ->with('error', 'Payment not initialized. Please try again.');
        }

        return view('shop.payment.irembopay', compact('purchase', 'paymentDetails'));
    }

    /**
     * Handle IremboPay callback (webhook)
     */
    public function handleIremboPayCallback(Request $request)
    {
        $payload = $request->getContent();
        $signature = $request->header('X-IremboPay-Signature');

        // Verify webhook signature
        if (!$this->iremboPayService->verifyWebhookSignature($payload, $signature)) {
            Log::warning('IremboPay webhook signature verification failed', [
                'payload' => $payload,
                'signature' => $signature
            ]);
            return response()->json(['error' => 'Invalid signature'], 400);
        }

        $data = json_decode($payload, true);

        Log::info('IremboPay webhook received', $data);

        try {
            // Find the purchase by reference (download_code)
            $reference = $data['reference'] ?? null;
            if (!$reference) {
                Log::error('IremboPay webhook missing reference', $data);
                return response()->json(['error' => 'Missing reference'], 400);
            }

            $purchase = AlbumPurchase::where('download_code', $reference)->first();
            if (!$purchase) {
                Log::error('IremboPay webhook: Purchase not found', [
                    'reference' => $reference,
                    'data' => $data
                ]);
                return response()->json(['error' => 'Purchase not found'], 404);
            }

            // Update purchase status based on webhook data
            $status = $data['status'] ?? 'pending';
            $transactionId = $data['transaction_id'] ?? $purchase->transaction_id;

            $updateData = [
                'transaction_id' => $transactionId,
                'payment_details' => array_merge($purchase->payment_details ?? [], [
                    'webhook_data' => $data,
                    'status' => $status,
                    'processed_at' => now(),
                ]),
            ];

            if ($status === 'completed' || $status === 'success') {
                $updateData['payment_status'] = 'completed';
            } elseif ($status === 'failed' || $status === 'cancelled') {
                $updateData['payment_status'] = 'failed';
            }

            $purchase->update($updateData);

            Log::info('IremboPay webhook processed successfully', [
                'purchase_id' => $purchase->id,
                'status' => $status,
                'transaction_id' => $transactionId
            ]);

            return response()->json(['status' => 'success']);

        } catch (\Exception $e) {
            Log::error('IremboPay webhook processing failed', [
                'error' => $e->getMessage(),
                'data' => $data
            ]);
            return response()->json(['error' => 'Processing failed'], 500);
        }
    }

    /**
     * Handle IremboPay return URL (user returns from payment)
     */
    public function handleIremboPayReturn(Request $request)
    {
        $reference = $request->get('reference');
        $status = $request->get('status');

        if (!$reference) {
            return redirect()->route('shop.index')
                ->with('error', 'Invalid payment return.');
        }

        $purchase = AlbumPurchase::where('download_code', $reference)->first();
        if (!$purchase) {
            return redirect()->route('shop.index')
                ->with('error', 'Purchase not found.');
        }

        // Check payment status with IremboPay API
        try {
            $invoiceStatus = $this->iremboPayService->getInvoiceStatus($purchase->transaction_id);
            $apiStatus = $invoiceStatus['data']['status'] ?? 'pending';

            if ($apiStatus === 'completed' || $apiStatus === 'success') {
                $purchase->update(['payment_status' => 'completed']);
                return redirect()->route('shop.download', $purchase->download_code)
                    ->with('success', 'Payment successful! Your album is ready for download.');
            } elseif ($apiStatus === 'failed' || $apiStatus === 'cancelled') {
                $purchase->update(['payment_status' => 'failed']);
                return redirect()->route('shop.purchase', $purchase->album)
                    ->with('error', 'Payment failed. Please try again.');
            }

            // Still pending
            return redirect()->route('shop.purchase', $purchase->album)
                ->with('info', 'Payment is still being processed. You will receive an email when completed.');

        } catch (\Exception $e) {
            Log::error('IremboPay return processing failed', [
                'purchase_id' => $purchase->id,
                'error' => $e->getMessage()
            ]);

            return redirect()->route('shop.purchase', $purchase->album)
                ->with('error', 'Unable to verify payment status. Please contact support.');
        }
    }

    /**
     * Check payment status manually
     */
    public function checkPaymentStatus(AlbumPurchase $purchase)
    {
        if (!$purchase->transaction_id) {
            return response()->json(['error' => 'No transaction ID'], 400);
        }

        try {
            $invoiceStatus = $this->iremboPayService->getInvoiceStatus($purchase->transaction_id);
            $status = $invoiceStatus['data']['status'] ?? 'pending';

            // Update local status if needed
            if ($status === 'completed' && $purchase->payment_status !== 'completed') {
                $purchase->update(['payment_status' => 'completed']);
            } elseif ($status === 'failed' && $purchase->payment_status !== 'failed') {
                $purchase->update(['payment_status' => 'failed']);
            }

            return response()->json([
                'status' => $status,
                'payment_status' => $purchase->payment_status,
                'can_download' => $purchase->isPaid()
            ]);

        } catch (\Exception $e) {
            Log::error('Payment status check failed', [
                'purchase_id' => $purchase->id,
                'error' => $e->getMessage()
            ]);

            return response()->json(['error' => 'Unable to check payment status'], 500);
        }
    }
}
