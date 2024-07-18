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
        'domain' => "",
        'secret' => "",
    ],

    'ses' => [
        'key' => "",
        'secret' => "",
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => "",
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => "",
        'secret' => "",
    ],

];
