<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Exception;

class IremboPayService
{
    protected $baseUrl;
    protected $publicKey;
    protected $secretKey;
    protected $environment;

    public function __construct()
    {
        $this->environment = config('irembopay.environment');
        $config = config("irembopay.{$this->environment}");

        $this->baseUrl = $config['base_url'];
        $this->publicKey = $config['public_key'];
        $this->secretKey = $config['secret_key'];
    }

    /**
     * Create an invoice for payment
     *
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function createInvoice(array $data): array
    {
        $payload = [
            'amount' => $data['amount'],
            'currency' => $data['currency'] ?? config('irembopay.currency'),
            'description' => $data['description'],
            'customer_email' => $data['customer_email'],
            'customer_name' => $data['customer_name'],
            'customer_phone' => $data['customer_phone'] ?? null,
            'callback_url' => config('irembopay.callback_url'),
            'return_url' => config('irembopay.return_url'),
            'reference' => $data['reference'], // Your internal reference
        ];

        try {
            $response = Http::timeout(config('irembopay.timeout'))
                ->withHeaders([
                    'Authorization' => 'Bearer ' . $this->secretKey,
                    'Content-Type' => 'application/json',
                ])
                ->post($this->baseUrl . '/invoices', $payload);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('IremboPay invoice created successfully', [
                    'invoice_id' => $data['data']['id'] ?? null,
                    'reference' => $payload['reference']
                ]);
                return $data;
            }

            throw new Exception('Failed to create invoice: ' . $response->body());

        } catch (Exception $e) {
            Log::error('IremboPay invoice creation failed', [
                'error' => $e->getMessage(),
                'payload' => $payload
            ]);
            throw $e;
        }
    }

    /**
     * Get invoice status
     *
     * @param string $invoiceId
     * @return array
     * @throws Exception
     */
    public function getInvoiceStatus(string $invoiceId): array
    {
        try {
            $response = Http::timeout(config('irembopay.timeout'))
                ->withHeaders([
                    'Authorization' => 'Bearer ' . $this->secretKey,
                    'Content-Type' => 'application/json',
                ])
                ->get($this->baseUrl . "/invoices/{$invoiceId}");

            if ($response->successful()) {
                return $response->json();
            }

            throw new Exception('Failed to get invoice status: ' . $response->body());

        } catch (Exception $e) {
            Log::error('IremboPay invoice status check failed', [
                'error' => $e->getMessage(),
                'invoice_id' => $invoiceId
            ]);
            throw $e;
        }
    }

    /**
     * Verify webhook signature
     *
     * @param string $payload
     * @param string $signature
     * @return bool
     */
    public function verifyWebhookSignature(string $payload, string $signature): bool
    {
        $expectedSignature = hash_hmac('sha256', $payload, config('irembopay.webhook_secret'));
        return hash_equals($expectedSignature, $signature);
    }

    /**
     * Get payment methods available
     *
     * @return array
     * @throws Exception
     */
    public function getPaymentMethods(): array
    {
        try {
            $response = Http::timeout(config('irembopay.timeout'))
                ->withHeaders([
                    'Authorization' => 'Bearer ' . $this->secretKey,
                    'Content-Type' => 'application/json',
                ])
                ->get($this->baseUrl . '/payment-methods');

            if ($response->successful()) {
                return $response->json();
            }

            throw new Exception('Failed to get payment methods: ' . $response->body());

        } catch (Exception $e) {
            Log::error('IremboPay payment methods fetch failed', [
                'error' => $e->getMessage()
            ]);
            throw $e;
        }
    }

    /**
     * Get the public key for frontend integration
     *
     * @return string
     */
    public function getPublicKey(): string
    {
        return $this->publicKey;
    }

    /**
     * Get the base URL for frontend integration
     *
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * Check if service is configured properly
     *
     * @return bool
     */
    public function isConfigured(): bool
    {
        return !empty($this->publicKey) && !empty($this->secretKey) && !empty($this->baseUrl);
    }

    /**
     * Get environment
     *
     * @return string
     */
    public function getEnvironment(): string
    {
        return $this->environment;
    }
}
