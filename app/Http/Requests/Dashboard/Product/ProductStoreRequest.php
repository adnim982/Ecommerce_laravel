<?php

namespace App\Http\Requests\Dashboard\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
  

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|| max:255',
            'description' => 'required|string',
            'price' => 'nullable| numeric',
            'category_id' => 'required|numeric|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'discount_price' => 'nullable|numeric',
            'colors' => 'nullable|array',
            'color.*' => 'nullable|string',
            'size' => 'nullable|array',
            'size.*' => 'nullable|string',
        ];
    }
}
