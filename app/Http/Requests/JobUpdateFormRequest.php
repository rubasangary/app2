<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobUpdateFormRequest extends FormRequest
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

            'name' => 'required|min:3|max:160',
            'description' => 'required|min:3|max:500',
            'qualification' => 'required|min:3|max:300',
            'requirement' => 'required|min:3|max:300',
            'salary'=> "required|regex:/^\d+(\.\d{1,2})?$/",

            'company_name' => 'required',
            'address' => 'required|min:3|max:160',
            'phone' => 'required|max:12',
            'email_status' => 'required',
        ];
    }
}
