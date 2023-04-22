<?php

namespace App\Http\Controllers;
use App\Services\CarService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the cars service
     * @var CarService
     */
    public $carService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    /**
     * Return a list of all cars
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->successResponse($this->carService->obtainCars());
    }

    /**
     * Create an instance of car in the database
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

    }

    /**
     * Return a specific car
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return $this->successResponse($this->carService->obtainCar($id));
    }

    /**
     * Updates the instance of the car that matches the given id
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Deletes a specific instance of car in the database
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        return $this->successResponse($this->carService->deleteCar($id));
    }
}
