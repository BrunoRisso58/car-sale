<?php

namespace App\Http\Controllers;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;

class CityController extends Controller
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
     * Return all cities
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $cities = City::all();
        return $this->successResponse($cities);
    }

    /**
     * Create a new instance of city
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:256', // not the best approach because there could be different cities with the same name but it works in the scope of cities in my region
            'state' => 'required|max:256',
            'state_initials' => 'required|max:2',
        ];
        $this->validate($request, $rules);

        // Adds a new attribute in the object called city_state
        $cityRequest = $request->all();
        $cityRequest["city_state"] = "$request->name/$request->state_initials";

        $city = City::create($cityRequest);

        return $this->successResponse($city, Response::HTTP_CREATED);
    }

    /**
     * Return the city that matched the given id
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $city = City::findOrFail($id);
        return $this->successResponse($city);
    }

    /**
     * Update the city that matches the given id
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|max:256', // not the best approach because there could be different cities with the same name but it works in the scope of cities in my region
            'state' => 'required|max:256',
            'state_initials' => 'required|max:2',
        ];
        $this->validate($request, $rules);

        $cityRequest = $request->all();
        $cityRequest["city_state"] = "$request->name/$request->state_initials";

        $city = City::findOrFail($id);

        $city->fill($cityRequest);

        if ($city->isClean()) {
            return $this->errorResponse("Please change some information", Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $city->save();

        return $this->successResponse($city);
    }

    /**
     * Delete the city that matches the given id
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();
        return $this->successResponse($city);
    }
}
