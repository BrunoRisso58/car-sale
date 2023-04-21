<?php

namespace App\Services;

class CarService
{
    /**
     * The base uri to consume the cars service
     */
    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.cars.base_uri');
    }
}