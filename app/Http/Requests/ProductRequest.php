<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:products|max:255',
//            'small_description' => 'required|max:255|min:10',
            'description' => 'required|max:255|min:20',
            'original_price' => 'required',
//            'selling_price' => 'required',
            'qty' => 'required',
//            'taxsss' => 'required',
//            'status' => 'required',
//            'trending' => 'required',
//            'meta_title' => 'required|max:150|min:3',
//            'meta_descrip' => 'required|max:255|min:10',
//            'meta_keywords' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Product name is required!',
//            'small_description.required' => 'small_description name is required!',
            'description.required' => 'Product discription is required!',
            'original_price.required' => 'Product Price is required!',
//            'selling_price.required' => 'Product Selling price is required!',
            'qty.required' => 'Product Quantity is required!',
//            'taxsss.required' => 'taxsss is required!',
//            'meta_title.required' => 'meta_title  is required!',
//            'meta_descrip.required' => 'meta_descrip  is required!',
//            'meta_keywords.required' => 'meta_keywords  is required!',
            'image.required' => 'Product image is required!',

        ];
    }
}
