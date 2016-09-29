<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
<<<<<<< HEAD
        'key'    => env('SES_KEY'),
=======
        'key' => env('SES_KEY'),
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

<<<<<<< HEAD
    'stripe' => [
        'model'  => CodeDelivery\User::class,
        'key'    => env('STRIPE_KEY'),
=======
    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => CodeDelivery\User::class,
        'key' => env('STRIPE_KEY'),
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f
        'secret' => env('STRIPE_SECRET'),
    ],

];
