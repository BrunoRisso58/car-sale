<?php

namespace App\Services;
use App\Traits\ConsumesExternalServices;

class BrandService
{
    use ConsumesExternalServices;

    /**
     * The base uri to consume the brands service
     */
    public $baseUri;

    /**
     * The secret to consume the brands service
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.brands.base_uri');
        $this->secret = config('services.brands.secret');
    }

    /**
     * Obtain the full list of brands from the brand service
     * @return string
     */
    public function obtainBrands()
    {
        return $this->performRequest('GET', '/brands');
    }

    /**
     * Create one brand using the brand service
     * @param array|string $data
     * @return string
     */
    public function createBrand($data)
    {
        return $this->performRequest('POST', '/brands', $data);
    }

    /**
     * Obtain one specific brand from the brand service
     * @param int $id
     * @return string
     */
    public function obtainBrand($id)
    {
        return $this->performRequest('GET', "/brands/{$id}");
    }

    /**
     * Edit a brand from the brand service
     * @param int $id
     * @param array|string $data
     * @return string
     */
    public function editBrand($id, $data)
    {
        return $this->performRequest('PUT', "/brands/{$id}", $data);
    }

    /**
     * Delete a brand from the brand service
     * @param int $id
     * @return string
     */
    public function deleteBrand($id)
    {
        return $this->performRequest('DELETE', "/brands/{$id}");
    }
}