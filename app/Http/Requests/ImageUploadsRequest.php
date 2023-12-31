<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageUploadsRequest extends FormRequest
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

            'image_category_id' => [
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
                'required',
                'mimes:jpeg,jpg,png'
            ],

        ];

        return $rules;
    }
}
