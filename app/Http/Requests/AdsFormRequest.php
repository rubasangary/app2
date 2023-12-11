<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdsFormRequest extends FormRequest
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
            'feature_image' => 'required|mimes:jpeg,jpg,png',
            'second_image' => 'nullable|mimes:jpeg,jpg,png',
            'third_image' => 'nullable|mimes:jpeg,jpg,png',

            'adscategory_id'=>'required',
            'subcategory_id'=>'required',
            'childcategory_id'=>'required',

            'name' => 'required|min:3|max:160',
            'description' => 'required|min:3',
            'price'=> "required|regex:/^\d+(\.\d{1,2})?$/",
            'price_status'=>'required',
            'product_condition'=>'required',

            'district' => 'required',
            'location' => 'required|min:3|max:160',
            'phone' => 'nullable|max:12',
            'link' => 'nullable|active_url',
        ];
    }
}
