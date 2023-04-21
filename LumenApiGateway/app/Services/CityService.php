<?php

namespace App\Services;

class CityService
{
    // TODO: implement service functions
    
    /**
     * The base uri to consume the cities service
     */
    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.cities.base_uri');
    }
}