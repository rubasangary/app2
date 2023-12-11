<?php

namespace App\Http\Requests\Admin;
use Intervention\Image\ImageManagerStatic as Image;

use Illuminate\Foundation\Http\FormRequest;

class PostEditFormRequest extends FormRequest
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
        $rules = [

            'category_id' => [
                'required',
                'integer'
            ],

            'name' => [
                'required',
                'string'
            ],

            'description' => [
                'required'
            ],

            'image' => [
                'nullable',
                'mimes:jpeg,jpg,png'
            ],

            'yt_iframe' => [
                'nullable',
                'string'
            ],

            'web_link' => [
                'nullable',
                'string'
            ],

            'meta_title' => [
                'nullable',
                'string'
            ],

            'meta_description' => [
                'nullable',
                'string'
            ],

            'meta_keyword' => [
                'nullable',
                'string'
            ],

            'status' => [
                'nullable'
            ],



        ];

        return $rules;
    }
}
