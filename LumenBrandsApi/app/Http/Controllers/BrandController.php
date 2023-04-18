<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Brand;

class BrandController extends Controller
{

    // TODO: create trait ApiResponser
    // TODO: Implement successResponse() and errorResponse() on return

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
     * Return the list of brands
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return $brands;
    }

    /**
     * Create a new instance of brand
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:256'
        ];
        $this->validate($request, $rules);
        $brand = Brand::create($request->all());
        return $brand;
    }

    /**
     * Return the brand that matches with the given id
     *
     * @return Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Brand::findOrFail($id);
        return $brand;
    }

    /**
     * Update a brand
     *
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|max:256'
        ];
        $this->validate($request, $rules);

        $brand = Brand::findOrFail($id);

        $brand->fill($request->all());

        if ($brand->isClean()) {
            return new Response("Error. Change at least one data.", 422);
        }

        $brand->save();

        return $brand;
    }

    /**
     * Delete a branch
     *
     * @return Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return $brand;
    }

}
