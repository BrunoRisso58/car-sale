<?php

namespace App\Services;

class CarService
{
    // TODO: implement service functions

    /**
     * The base uri to consume the cars service
     */
    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.cars.base_uri');
    }
}