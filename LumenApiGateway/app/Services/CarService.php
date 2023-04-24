<?php

namespace App\Services;
use App\Traits\ConsumesExternalServices;

class CarService
{
    use ConsumesExternalServices;

    /**
     * The base uri to consume the cars service
     */
    public $baseUri;

    /**
     * The secret to consume the cars service
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.cars.base_uri');
        $this->secret = config('services.cars.secret');
    }

    /**
     * Obtain the full list of cars from the car service
     * @return string
     */
    public function obtainCars()
    {
        return $this->performRequest('GET', '/cars');
    }

    /**
     * Create a new car using the car service
     * @param array|string $data
     * @return string
     */
    public function createCar($data)
    {
        return $this->performRequest('POST', '/cars', $data);
    }

    /**
     * Obtain one specific car from the car service
     * @param int $id
     * @return string
     */
    public function obtainCar($id)
    {
        return $this->performRequest('GET', "/cars/{$id}");
    }

    /**
     * Update a car from the car service
     * @param int $id
     * @param array|string $data
     * @return string
     */
    public function editCar($id, $data)
    {
        return $this->performRequest('PUT', "/cars/{$id}", $data);
    }

    /**
     * Delete a car from the car service
     * @param int $id
     * @return string
     */
    public function deleteCar($id)
    {
        return $this->performRequest('DELETE', "/cars/{$id}");
    }
}