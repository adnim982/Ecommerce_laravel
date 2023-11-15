<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository implements RepositoryInterface
{
    // construct 
    public $category;

    public function __construct(Category $category){
        $this->category = $category;
    }
    public function getMaincategory(){
        return $this->category->where('parent_id', 1)->orWhere('parent_id', null)->get();
    }
    public function storedata($data){
        return $this->category->create($data);
    }
    public function updatedata($data, $id)
    {
        return $this->category->findOrFail($id)->update($data);
    }
    public function getByid($id){
        return $this->category->withcount('child')->findOrFail($id);
        
    }
    public function delete($id)
    {
        return $this->category->findOrFail($id)->delete($id);
    }
    
}
