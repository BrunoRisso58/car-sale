<?php

namespace App\Services;

class BrandService 
{
    // TODO: implement service functions

    /**
     * The base uri to consume the brands service
     */
    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.brands.base_uri');
    }
}