<?php

namespace App\Services;

use App\Models\Category;
use App\Utils\ImageUpload;
use App\Repositories\CategoryRepository;
use Yajra\DataTables\Facades\DataTables;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Http\Request; // Import the Request class

class CategoryService
{
    public $CategoryRepository;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->CategoryRepository = $categoryRepository;
    }
    public function getMaincategory(){
       return $this->CategoryRepository->getMaincategory();
    }
    public function datatable(){
        $query = Category::select('*')->with('parent');

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn("action", function ($row) {
                $btn = '<div class="btn-grid">' .
                    '<a href="' . route("categories.edit", $row->id) . '" class="edit btn btn-success btn-sm"><i class="fa fa-edit"></i></a>' .
                    '<form action="' . route("categories.destroy", $row->id) . '" method="POST" class="delete-form">' .
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
            ->addColumn("parent", function ($row) {
                // say if there is not a parent id do maincategory
                return ($row->parent == null) ? 'Main Category' : $row->parent->name;
            })
            ->addColumn("image", function ($row) {
                return '<img src="' . asset($row->image) . '" alt="" srcset="">';
            })
            ->rawColumns(["parent", "action", "image"])
            ->make(true);
    }
    public function getByid($id){
        return $this->CategoryRepository->getByid($id);
    }



public function storedata(UploadedFile $image, array $data)
{
    if ($image) {
        $data['image'] = ImageUpload::upload($image, 'categories');
    }

    return $this->CategoryRepository->storedata($data);

}
public function updatedata(UploadedFile $image, array $data, $id)
{
    $category = $this->CategoryRepository->getByid($id);

    if ($image) {
        $data['image'] = ImageUpload::upload($image, 'categories');
    }

    return $this->CategoryRepository->updatedata($data, $id);
}

public function updatedataWithoutImage(array $data, $id)
{
    // Update category data without modifying the image
    unset($data['image']);
    return $this->CategoryRepository->updatedata($data, $id);
}
// delete
public function destroy($id){
    $category = $this->CategoryRepository->delete($id);
    return $category;
}


}
