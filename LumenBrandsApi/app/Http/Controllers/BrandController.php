<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Brand;
use App\Traits\ApiResponser;

class BrandController extends Controller
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
     * Return the list of brands
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $brands = Brand::all();
        return $this->successResponse($brands);
    }

    /**
     * Create a new instance of brand
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:256'
        ];
        $this->validate($request, $rules);
        $brand = Brand::create($request->all());
        return $this->successResponse($brand, Response::HTTP_CREATED);
    }

    /**
     * Return the brand that matches the given id
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $brand = Brand::findOrFail($id);
        return $this->successResponse($brand);
    }

    /**
     * Update a brand
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
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
            return $this->errorResponse("Please change some information", Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $brand->save();

        return $this->successResponse($brand);
    }

    /**
     * Delete a branch
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return $this->successResponse($brand);
    }
}
