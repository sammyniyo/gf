<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'spotify' => [
        'client_id' => env('SPOTIFY_CLIENT_ID'),
        'client_secret' => env('SPOTIFY_CLIENT_SECRET'),
    ],

    'whatsapp' => [
        // Main group - for all members, friends, and supporters
        'main_group_link' => env('WHATSAPP_INVITE', 'https://chat.whatsapp.com/BbBhLCpiOXrEpjB5u1bNwq'),

        // Active members group - for registered choir members who attend rehearsals
        'choir_group_link' => env('WHATSAPP_CHOIR_GROUP', 'https://chat.whatsapp.com/BbBhLCpiOXrEpjB5u1bNwq'),
        'active_choristers_link' => env('WHATSAPP_ACTIVE_CHORISTERS', 'https://chat.whatsapp.com/BbBhLCpiOXrEpjB5u1bNwq'),
    ],

];
