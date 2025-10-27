# IremboPay Integration for God's Family Choir

This document explains how to complete the IremboPay integration for your Laravel application.

## Overview

IremboPay has been successfully integrated into your Laravel application to handle album purchases. The integration includes:

-   ✅ Configuration file (`config/irembopay.php`)
-   ✅ Service class (`app/Services/IremboPayService.php`)
-   ✅ Payment controller (`app/Http/Controllers/PaymentController.php`)
-   ✅ Updated shop controller with IremboPay support
-   ✅ Payment views and forms
-   ✅ Database migration for IremboPay fields
-   ✅ Routes for payment processing

## Setup Instructions

### 1. Environment Configuration

Add these variables to your `.env` file:

```env
# IremboPay Environment (sandbox or production)
IREMBOPAY_ENVIRONMENT=sandbox

# Sandbox Configuration
IREMBOPAY_SANDBOX_URL=https://sandbox.irembopay.com/api/v1
IREMBOPAY_SANDBOX_PUBLIC_KEY=your_sandbox_public_key_here
IREMBOPAY_SANDBOX_SECRET_KEY=your_sandbox_secret_key_here

# Production Configuration (uncomment when ready for production)
# IREMBOPAY_PRODUCTION_URL=https://api.irembopay.com/api/v1
# IREMBOPAY_PRODUCTION_PUBLIC_KEY=your_production_public_key_here
# IREMBOPAY_PRODUCTION_SECRET_KEY=your_production_secret_key_here

# Callback URLs (these will be automatically set based on your APP_URL)
IREMBOPAY_CALLBACK_URL=${APP_URL}/payments/irembopay/callback
IREMBOPAY_RETURN_URL=${APP_URL}/payments/irembopay/return

# Currency (default: RWF)
IREMBOPAY_CURRENCY=RWF

# API Timeout (default: 30 seconds)
IREMBOPAY_TIMEOUT=30

# Webhook Secret (for verifying webhook signatures)
IREMBOPAY_WEBHOOK_SECRET=your_webhook_secret_here
```

### 2. Run Database Migration

```bash
php artisan migrate
```

This will add the necessary fields to the `album_purchases` table to support IremboPay integration.

### 3. Get IremboPay API Credentials

1. Sign up for an IremboPay account at [IremboPay](https://irembopay.com)
2. Get your sandbox API keys from the IremboPay dashboard
3. Update your `.env` file with the actual API keys
4. Configure your webhook URL in the IremboPay dashboard: `https://yourdomain.com/payments/irembopay/callback`

### 4. Test the Integration

1. Create a test album in your admin panel
2. Go to the shop and try to purchase the album
3. Select "IremboPay" as the payment method
4. Complete the payment flow

## How It Works

### Payment Flow

1. **Customer selects IremboPay** in the purchase form
2. **System creates invoice** via IremboPay API
3. **Customer is redirected** to IremboPay payment page
4. **Customer completes payment** using their preferred method
5. **IremboPay sends webhook** to your callback URL
6. **System updates purchase status** and enables download

### Key Components

#### IremboPayService

Handles all API interactions with IremboPay:

-   Creating invoices
-   Checking payment status
-   Verifying webhook signatures

#### PaymentController

Manages the payment flow:

-   Initializes payments
-   Handles webhooks
-   Processes returns
-   Checks payment status

#### Database Fields

New fields added to `album_purchases`:

-   `irembo_invoice_id`: IremboPay invoice ID
-   `irembo_reference`: Reference used for tracking
-   `irembo_payment_details`: JSON data from IremboPay
-   `payment_processed_at`: When payment was processed

## Security Features

-   ✅ Webhook signature verification
-   ✅ SSL encrypted connections
-   ✅ Secure API key storage
-   ✅ Input validation and sanitization
-   ✅ Error logging and monitoring

## Testing

### Sandbox Testing

1. Use sandbox API keys
2. Test with sandbox payment methods
3. Verify webhook callbacks
4. Check payment status updates

### Production Deployment

1. Switch to production API keys
2. Update environment to `production`
3. Test with real payment methods
4. Monitor webhook logs

## Troubleshooting

### Common Issues

1. **Webhook not received**

    - Check webhook URL configuration in IremboPay dashboard
    - Verify webhook secret matches
    - Check server logs for errors

2. **Payment status not updating**

    - Verify webhook signature verification
    - Check database connection
    - Review payment controller logs

3. **API errors**
    - Verify API keys are correct
    - Check API endpoint URLs
    - Review request/response logs

### Logs

Check these locations for debugging:

-   `storage/logs/laravel.log` - Application logs
-   IremboPay dashboard - Payment logs
-   Browser developer tools - Frontend errors

## Support

For issues with:

-   **IremboPay API**: Contact IremboPay support
-   **Integration code**: Check this documentation
-   **Laravel application**: Review Laravel documentation

## Next Steps

1. Complete the environment setup
2. Run the database migration
3. Test with sandbox credentials
4. Configure production settings
5. Go live with real payments

The integration is now complete and ready for testing!



