<?php

namespace App\Http\Controllers\Dashboard;

use DataTables;
use App\Models\Category;
use App\Utils\ImageUpload;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Category\CategoryStoreRequest;
use App\Http\Requests\Dashboard\Category\CategoryDeleteRequest;
use App\Http\Requests\Dashboard\Category\CategoryUpdateRequest;

class CategoryController extends Controller
{
    // make constructur to bind CategoryService class
    protected $categoryService;
    public function __construct(CategoryService $categoryService){
        $this->categoryService = $categoryService;
    }
    public function index(){
        $categories = $this->categoryService->getMaincategory();
        return view('dashboard.categories.index', compact('categories'));
    }
    public function getall()
    {
        return $this->categoryService->datatable();
    }

    public function create()
    {
        $categories = Category::where('parent_id', 1)->orWhere('parent_id', null)->get();
        return view('dashboard.categories.create', compact('categories'));
    }

    public function store(CategoryStoreRequest $request)
    {
        $data = $request->all();


        if ($request->hasFile('image')) {
            $image = $request->file('image');
        }else{
            $image = null;
        }

        $this->categoryService->storedata($image, $data);

        return redirect()->route('categories.index')->with('success', 'Category has been created');
    }

    public function edit($id)
{
    $category = $this->categoryService->getByid($id);
    $mainCategories = $this->categoryService->getMaincategory();
    return view('dashboard.categories.edit', compact('category', 'mainCategories'));
}





public function update(CategoryUpdateRequest $request, $id)
{
    $data = $request->all();
    $image = null;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
    }

    if ($image) {
        $this->categoryService->updatedata($image, $data, $id);
    } else {
        $this->categoryService->updatedataWithoutImage($data, $id);
    }

    return redirect()->route('categories.index')->with('success', 'All Inputs Have Been Updated');
}


    public function destroy(CategoryDeleteRequest $request)
    {
        $category = $this->categoryService->destroy($request->id);
        if ($category) {
            return redirect()->route('categories.index')->with('success', 'Category has been deleted');
        } else {
            return redirect()->route('categories.index')->with('error', 'Category not found');
        }
    }
}
