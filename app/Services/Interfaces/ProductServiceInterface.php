<?php

namespace App\Services\Interfaces;

interface ProductServiceInterface
{
    public function getAllProducts();
    public function getProductById($id);
    public function deleteProduct($id);
    public function createProduct(array $productData);
    public function updateProduct($id, array $productData);
}
