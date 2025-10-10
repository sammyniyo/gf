<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;

class MailConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Override mail configuration to use log driver if no .env is configured
        if (!env('MAIL_HOST') || env('MAIL_HOST') === 'mailpit') {
            Config::set('mail.default', 'log');
            Config::set('mail.from.address', 'noreply@godsfamilychoir.com');
            Config::set('mail.from.name', 'God\'s Family Choir');
        }
    }
}
