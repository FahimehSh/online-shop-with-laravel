<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
//            'title' => 'required|unique:categories,title|min:2|max:255',
//            'meta_title' => 'min:3|max:255',
//            'images' => 'required',
//            'images' => 'image|mimes:jpeg,png,jpg|max:2048'
        ];
    }
}
