<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdsFormUpdateRequest extends FormRequest
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
            'name'=>'required|min:3|max:120',
            'description'=>'required|min:3',
            'price'=> "required|regex:/^\d+(\.\d{1,2})?$/",
            'price_status'=>'required',
            'product_condition'=>'required',
            'phone_number'=>'numeric'
        ];
    }
}
