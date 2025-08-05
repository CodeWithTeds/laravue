<?php

namespace App\Http\Controllers\Api;

use App\Traits\ApiResponder;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Services\Interfaces\ProductServiceInterface;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    use ApiResponder;
    
    public function __construct(
        protected ProductServiceInterface $productService)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productService->getAllProducts();
        return $this->successResponse($products, 'Products fetched successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Product\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = $this->productService->createProduct($request->validated());
        return $this->successResponse($product, 'Product created successfully', Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->productService->getProductById($id);

        if (!$product) {
            return $this->errorResponse('Product not found', Response::HTTP_NOT_FOUND);
        }
        return $this->successResponse($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Product\UpdateProductRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = $this->productService->getProductById($id);

        if (!$product) {
            return $this->errorResponse('Product not found', Response::HTTP_NOT_FOUND);
        }

        $updatedProduct = $this->productService->updateProduct($id, $request->validated());

        return $this->successResponse($updatedProduct, 'Product updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->productService->getProductById($id);

        if (!$product) {
            return $this->errorResponse('Product not found', Response::HTTP_NOT_FOUND);
        }

        $this->productService->deleteProduct($id);

        return $this->successResponse(null, 'Product deleted successfully');
    }
}