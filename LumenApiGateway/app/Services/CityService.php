<?php

namespace App\Services;
use App\Traits\ConsumesExternalServices;

class CityService
{
    use ConsumesExternalServices;

    /**
     * The base uri to consume the cities service
     */
    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.cities.base_uri');
    }

    /**
     * Obtain the full list of cities from the city service
     * @return string
     */
    public function obtainCities()
    {
        return $this->performRequest('GET', '/cities');
    }

    /**
     * Create a new city using the city service
     * @param array|string $data
     * @return string
     */
    public function createCity($data)
    {
        return $this->performRequest('POST', '/cities', $data);
    }

    /**
     * Obtain one specific city from the city service
     * @param int $id
     * @return string
     */
    public function obtainCity($id)
    {
        return $this->performRequest('GET', "/cities/{$id}");
    }

    /**
     * Edit a city from the city service
     * @param int $id
     * @param array|string $data
     * @return string
     */
    public function editCity($id, $data)
    {
        return $this->performRequest('PUT', "/cities/{$id}", $data);
    }

    /**
     * Delete one specific city from the city service
     * @param int $id
     * @return string
     */
    public function deleteCity($id)
    {
        return $this->performRequest('DELETE', "/cities/{$id}");
    }
}