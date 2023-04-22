<?php

namespace App\Http\Controllers;
use App\Services\CityService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CityController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the cities microservice
     * @var CityService
     */
    public $cityService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
    }

    /**
     * Return all cities
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->successResponse($this->cityService->obtainCities());
    }

    /**
     * Create a new instance of city
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        return $this->successResponse($this->cityService->createCity($request->all()), Response::HTTP_CREATED);
    }

    /**
     * Return the city that matched the given id
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return $this->successResponse($this->cityService->obtainCity($id));
    }

    /**
     * Update the city that matches the given id
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        return $this->successResponse($this->cityService->editCity($id, $request->all()));
    }

    /**
     * Delete the city that matches the given id
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        return $this->successResponse($this->cityService->deleteCity($id));
    }
}
