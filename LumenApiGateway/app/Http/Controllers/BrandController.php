<?php

namespace App\Http\Controllers;
use App\Services\BrandService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BrandController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the brands microservice
     * @var BrandService
     */
    public $brandService;

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct(BrandService $brandService) // Lumen passes an instance of BrandService when controller is called
    {
        $this->brandService = $brandService;
    }

    /**
     * Return the list of brands
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->successResponse($this->brandService->obtainBrands());
    }

    /**
     * Create a new instance of brand
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        return $this->successResponse($this->brandService->createBrand($request->all()), Response::HTTP_CREATED);
    }

    /**
     * Return the brand that matches the given id
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return $this->successResponse($this->brandService->obtainBrand($id));
    }

    /**
     * Update a brand
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        return $this->successResponse($this->brandService->editBrand($id, $request->all()));
    }

    /**
     * Delete a branch
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        return $this->successResponse($this->brandService->deleteBrand($id));
    }
}
