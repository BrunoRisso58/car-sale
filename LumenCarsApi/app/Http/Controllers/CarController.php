<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarController extends Controller
{
    use ApiResponser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return a list of all cars
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $cars = Car::all();
        return $this->successResponse($cars);
    }

    /**
     * Create an instance of car in the database
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $rules = [
            "brand_id" => "required|int|min:1",
            "model" => "required|max:256",
            "year" => "required|int|min:1900",
            "city_id" => "required|int|min:1"
        ];
        $this->validate($request, $rules);

        $car = Car::create($request->all());
        return $this->successResponse($car, Response::HTTP_CREATED);

    }

    /**
     * Return a specific car
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $car = Car::findOrFail($id);
        return $this->successResponse($car);
    }

    /**
     * Updates the instance of the car that matches the given id
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $rules = [
            "brand_id" => "required|int|min:1",
            "model" => "required|max:256",
            "year" => "required|int|min:1900",
            "city_id" => "required|int|min:1"
        ];
        $this->validate($request, $rules);

        $car = Car::findOrFail($id);

        $car->fill($request->all());

        if ($car->isClean()) {
            return $this->errorResponse("Please change some information", Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        
        $car->save();

        return $this->successResponse($car);
    }

    /**
     * Deletes a specific instance of car in the database
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return $this->successResponse($car);
    }
}
