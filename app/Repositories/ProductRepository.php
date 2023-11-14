<?php

namespace App\Repositories;

use App\Models\Product;
//ali from git
class ProductRepsository implements RepositoryInterface
{
    public $product;
    public function __construct(Product $product)
    {
//        is good
        $this->product = $product;
    }
    public function getMaincategory(){
        return $this->product->where('parent_id', 1)->orWhere('parent_id', null)->get();
    }

    public function storedata($data)
    {
        // TODO: Implement storedata() method.
    }

    public function updatedata($data, $id)
    {
        // TODO: Implement updatedata() method.
    }

    public function getByid($id)
    {
        // TODO: Implement getByid() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
