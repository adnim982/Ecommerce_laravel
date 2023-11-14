<?php

namespace App\Repositories;

use App\Models\Product;
class ProductRepsository implements RepositoryInterface
{
    public $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
        php artisan serve ali fathan male and i need to buy a cuo of coffee
    }
    public function getMaincategory(){
        return $this->product->where('parent_id', 1)->orWhere('parent_id', null)->get();
    }

    public function storedata($data)
    {
//        this is a store function
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
