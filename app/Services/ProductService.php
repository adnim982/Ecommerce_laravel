<?php

namespace App\Services;

use App\Models\product;
use App\Repositories\CategoryRepository;
use App\Utils\ImageUpload;
use App\Repositories\ProductRepository;
use Illuminate\Database\Eloquent\Factories\Relationship;
use Yajra\DataTables\Facades\DataTables;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Http\Request; // Import the Request class

class ProductService
{
    public $ProductRepository;
    public $CategoryRepository;

    public function __construct(ProductRepository $ProductRepository, CategoryRepository $CategoryRepository)
    {
        $this->ProductRepository = $ProductRepository;
        $this->CategoryRepository = $ProductRepository;
    }
    public function getMainproduct(){
       return $this->ProductRepository->getMainProduct();
    }
    public function datatable(){
        $query = $this->ProductRepository->BaseQuery(relations:['category'],withcount:['productcolor']);
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn("action", function ($row) {
                $btn = '<div class="btn-grid">' .
                    '<a href="' . route("products.edit", $row->id) . '" class="edit btn btn-success btn-sm"><i class="fa fa-edit"></i></a>' .
                    '<form action="' . route("products.destroy", $row->id) . '" method="POST" class="delete-form">' .
    csrf_field() .
    method_field("DELETE") .
    '<input type="hidden" name="id" value="' . $row->id . '">' . // Add this line
    '<button type="submit" class="delete"><i class="fa fa-trash"></i></button></form>' .
'</div>' .
'<style>' . '
    .btn-grid {
        display: flex;
        align-items: center;
    }

    .delete-form {
        margin-left: 10px; /* Adjust the margin as needed to space out the buttons */
    }

    .delete {
        background-color: #ff0000; /* Red background color */
        border: none;
        color: white; /* White text color */
        padding: 5px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
        width : 70px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 4px; /* Add rounded corners */
    }

    /* Hover effect for the danger button */
    .delete:hover {
        background-color: #c82333; /* Darker red on hover */
    }

' . '</style>';


                return $btn;
            })
            ->addColumn('category', function ($row) {
                return $row->category ? $row->category->name : 'Default Category';

            })
            ->addColumn("image", function ($row) {
                return '<img src="' . asset($row->image) . '" alt="" srcset="">';
            })
            
            ->rawColumns(['action', 'image'])
            ->make(true);
    }
      
    public function getByid($id){
        return $this->ProductRepository->getByid($id);
    }
  



public function storedata(UploadedFile $image, array $data)
{
    if($image){
        $data['image'] = ImageUpload::upload($image, 'products');
    }
    return $this->ProductRepository->storedata($data);

}
public function updatedata(UploadedFile $image, array $data, $id)
{
    // $product = $this->productRepository->getByid($id);

    // if ($image) {
    //     $data['image'] = ImageUpload::upload($image, 'categories');
    // }

    // return $this->productRepository->updatedata($data, $id);
}

public function updatedataWithoutImage(array $data, $id)
{
    // Update product data without modifying the image
    // unset($data['image']);
    // return $this->productRepository->updatedata($data, $id);
}
// delete
public function destroy($id){
    // $product = $this->productRepository->delete($id);
    // return $product;
}


}
