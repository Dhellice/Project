<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
        'client_id' => '220642108424405',
        'client_secret' => '2740f4dee838101818627d81c0265a56',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],
    'twitter' => [
        'client_id' => 'MnGTK69jwcEk76f5UctjUTjYz',
        'client_secret' => 'p4vhK4GdtuhjwAg2aenKjhxgcuZZTnokTR12rcLAlmgxYi70sr',
        'redirect' => 'http://localhost:8000/auth/twitter/callback',
    ],
    'google' => [
        'client_id' => '613780817810-ajfjae8tf6rq3a3kpim6bmji22muhedm.apps.googleusercontent.com',
        'client_secret' => '1wPp1qtzc6tnKqm3xW2UQhFt',
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],

];
