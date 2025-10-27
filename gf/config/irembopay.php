<?php

return [
    /*
    |--------------------------------------------------------------------------
    | IremboPay Configuration
    |--------------------------------------------------------------------------
    |
    | Configuration for IremboPay payment gateway integration
    |
    */

    'environment' => env('IREMBOPAY_ENVIRONMENT', 'sandbox'), // sandbox or production

    'sandbox' => [
        'base_url' => env('IREMBOPAY_SANDBOX_URL', 'https://sandbox.irembopay.com/api/v1'),
        'public_key' => env('IREMBOPAY_SANDBOX_PUBLIC_KEY'),
        'secret_key' => env('IREMBOPAY_SANDBOX_SECRET_KEY'),
    ],

    'production' => [
        'base_url' => env('IREMBOPAY_PRODUCTION_URL', 'https://api.irembopay.com/api/v1'),
        'public_key' => env('IREMBOPAY_PRODUCTION_PUBLIC_KEY'),
        'secret_key' => env('IREMBOPAY_PRODUCTION_SECRET_KEY'),
    ],

    'callback_url' => env('IREMBOPAY_CALLBACK_URL', env('APP_URL') . '/payments/irembopay/callback'),
    'return_url' => env('IREMBOPAY_RETURN_URL', env('APP_URL') . '/payments/irembopay/return'),

    'currency' => env('IREMBOPAY_CURRENCY', 'RWF'),

    'timeout' => env('IREMBOPAY_TIMEOUT', 30), // seconds

    'webhook_secret' => env('IREMBOPAY_WEBHOOK_SECRET'),
];
