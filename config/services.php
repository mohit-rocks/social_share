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
      'client_id' => '1090271074415490',
      'client_secret' => 'cfef30abf00fa4ce766a47a7d926b6c5',
      'redirect' => 'http://blog.dev/callback/facebook',
    ],
    'twitter' => [
      'client_id' => 'IvktlPQx5FaELkjpQfO1V1PpQ',
      'client_secret' => 'BbRwvGReuI0t6Bm7gZmU922S8lv4Mte4ihKzLyJdSmu93bBiaV',
      'redirect' => 'http://blog.dev/callback/twitter',
    ],

];
