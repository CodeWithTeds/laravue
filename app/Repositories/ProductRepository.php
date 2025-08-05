<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function __construct(protected Product $model)
    {
    }

    public function getAllProducts()
    {
        return $this->model->all();
    }

    public function getProductById($id)
    {
        return $this->model->find($id);
    }

    public function deleteProduct($id)
    {
        $product = $this->model->find($id);
        if ($product) {
            return $product->delete();
        }
        return false;
    }

    public function createProduct(array $productData)
    {
        return $this->model->create($productData);
    }

    public function updateProduct($id, array $productData)
    {
        $product = $this->model->find($id);
        if ($product) {
            $product->update($productData);
            return $product;
        }
        return null;
    }
}
