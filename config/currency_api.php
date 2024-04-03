<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Currency API details
    |--------------------------------------------------------------------------
    |
    | Here you may specify the base url and version of the currency API
    |
    */

    'base_url' => env('CURRENCY_API_URL', 'https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api'),

    'version' => env('CURRENCY_API_VERSION', 'v1'),
];
