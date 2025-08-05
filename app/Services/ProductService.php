<?php

namespace App\Services;

use App\Models\Product;
use App\Services\Interfaces\ProductServiceInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductService implements ProductServiceInterface
{
    public function __construct(protected ProductRepositoryInterface $productRepository)
    {
    }

    public function getAllProducts()
    {
        return $this->productRepository->getAllProducts();
    }

    public function getProductById($id)
    {
        $product = $this->productRepository->getProductById($id);
        return $product;
    }

    public function deleteProduct($id)
    {
        return $this->productRepository->deleteProduct($id);
    }

    public function createProduct(array $productData)
    {
        return $this->productRepository->createProduct($productData);
    }

    public function updateProduct($id, array $productData)
    {
        return $this->productRepository->updateProduct($id, $productData);
    }
}
