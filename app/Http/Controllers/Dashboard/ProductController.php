<?php

namespace App\Http\Controllers\Dashboard;

use DataTables;
use App\Models\Category;
use App\Utils\ImageUpload;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Services\CategoryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Product\ProductStoreRequest;
use App\Http\Requests\Dashboard\Category\CategoryStoreRequest;
use App\Http\Requests\Dashboard\Category\CategoryDeleteRequest;
use App\Http\Requests\Dashboard\Category\CategoryUpdateRequest;

class ProductController extends Controller
{
    // make constructur to bind CategoryService class
    protected $productService;
    protected $categoryService;
    public function __construct(ProductService $productService, CategoryService $categoryService){
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }
    public function index(){
        $products = $this->productService->getMainProduct();
        return view('dashboard.products.index', compact('products'));
    }
    public function getall()
    {
        return $this->productService->datatable();
    }

    public function create()
    {
        $categories = $this->categoryService->getallcategory();
        return view('dashboard.products.create', compact('categories'));

    }

    public function store(ProductStoreRequest $request)
    {
        $data = $request->all();


        if ($request->hasFile('image')) {
            $image = $request->file('image');
        }else{
            $image = null;
        }
        if (isset($data['colors'])) {
        $data['color'] = implode(',', $data['colors']);
        unset($data['colors']);
        }
        if (isset($data['sizes'])) {
        $data['size'] = implode(',', $data['sizes']);
        unset($data['sizes']);
        }
        
    

        

        $this->productService->storedata($image, $data);

        return redirect()->route('products.index')->with('success', 'Product has been created');
    }

    public function edit($id)
{
        $categories = $this->categoryService->getallcategory();
        $product = $this->productService->getById($id);
        return view('dashboard.products.edit', compact ('categories', 'product'));
}





public function update(CategoryUpdateRequest $request, $id)
{
    $data = $request->all();
    $image = null;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
    }

    if ($image) {
        $this->productService->updatedata($image, $data, $id);
    } else {
        $this->productService->updatedataWithoutImage($data, $id);
    }
    

    return redirect()->route('products.index')->with('success', 'All Inputs Have Been Updated');
}


    public function destroy(CategoryDeleteRequest $request)
    {
        $product = $this->productService->destroy($request->id);
        if ($product) {
            return redirect()->route('products.index')->with('success', 'Category has been deleted');
        } else {
            return redirect()->route('products.index')->with('error', 'Category not found');
        }
    }
    
}
