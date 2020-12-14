<?php

use App\Interfaces\CrudInterface;
use App\Models\Product;

class ProductRepository implements CrudInterface{

    /**
     * Get All Products
     *
     * @return collections Array of Product Collection
     */
    public function getAll(){
        return Product::orderBy('id', 'desc')->get();
    }

    /**
     * Get Paginated Product Data
     *
     * @param int $pageNo
     * @return collections Array of Product Collection
     */
    public function getPaginatedData($pageNo){
        return Product::paginate($pageNo)->orderBy('id', 'desc')->get();
    }
    
    /**
     * Create New Product
     *
     * @param array $data
     * @return object Product Object
     */
    public function create(array $data){
        $product = Product::create($data);
        return $product;
    }

    /**
     * Delete Product
     *
     * @param int $id
     * @return boolean true if deleted otherwise false
     */
    public function delete($id){
        $product = Product::find($id);
        if (is_null($product))
            return false;

        $product->delete($product);
        return true;
    }

    /**
     * Get Product Detail By ID
     *
     * @param int $id
     * @return void
     */
    public function getByID($id){
        return Product::find($id);
    }

    /**
     * Update Product By ID
     *
     * @param int $id
     * @param array $data
     * @return object Updated Product Object
     */
    public function update($id,array $data){
        $product = Product::find($id);
        if (is_null($product))
            return null;

        $product->update($data);
        return $product;
    }
}