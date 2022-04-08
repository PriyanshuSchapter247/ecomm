<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|max:155|min:3',
            'description' => 'required|max:255|min:20',
//            'meta_title' => 'required|max:155|min:3',
//            'meta_descrip' => 'required|max:255|min:5',
//            'meta_keywords' => 'required',
        ];
    }

    public function messages()
    {
        return [
          'name.required' => 'Category name is required!',
          'description.required' => 'Category discription is required!',
//          'meta_title.required' => 'meta_title   is required!',
//          'meta_descrip.required' => 'meta_descrip  is required!',
//          'meta_keywords.required' => 'meta_keywords  is required!',

        ];
    }
}
