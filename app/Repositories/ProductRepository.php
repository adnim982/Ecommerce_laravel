<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository implements RepositoryInterface
{
    // construct 
    public $product;

    public function __construct(Product $product){
        $this->product = $product;
    }
    public function getMainproduct(){
        return $this->product->where('category_id', 1)->orWhere('category_id', null)->get();
    }
    public function storedata($data){
        // return $this->product->create($data);
    }
    public function updatedata($data, $id)
    {
        // return $this->product->findOrFail($id)->update($data);
    }
    public function getByid($id){
        return $this->product->withcount('child')->findOrFail($id);
        
    }
    public function delete($id)
    {
        // return $this->product->findOrFail($id)->delete($id);
    }
    
}
