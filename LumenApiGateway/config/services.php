<?php

return [
    'brands' => [
        'base_uri' => env('BRANDS_SERVICE_BASE_URL'),
        'secret' => env('BRANDS_SERVICE_SECRET')
    ],
    'cities' => [
        'base_uri' => env('CITIES_SERVICE_BASE_URL'),
        'secret' => env('CITIES_SERVICE_SECRET')
    ],
    'cars' => [
        'base_uri' => env('CARS_SERVICE_BASE_URL'),
        'secret' => env('CARS_SERVICE_SECRET')
    ],
];