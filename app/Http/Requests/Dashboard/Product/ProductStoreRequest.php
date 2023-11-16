<?php

namespace App\Http\Requests\Dashboard\Prosuct;

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
            'name' => 'required', 
            'category_id' => 'required',
            'price' => 'required',
            'image' => 'required',
            'description' => 'required',
            'discount_price' => 'required',
            'color' => 'required',
            'size' => 'required',
        ];
    }
}
