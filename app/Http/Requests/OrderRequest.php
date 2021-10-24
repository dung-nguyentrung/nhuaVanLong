<?php

namespace App\Http\Requests;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string'
            ],
            'phone' => [
                'required'
            ],
            'address' => [
                'required'
            ],
            'province_id' => [
                'required'
            ],
            'district_id' => [
                'required'
            ],
            'ward_id' => [
                'required'
            ],
            'subtotal' => [
                'required'
            ],
            'tax' => [
                'required'
            ],
            'shipping' => [
                'required'
            ],
            'total' => [
                'required'
            ],
            'company_name' => [
                'required',
                'string'
            ],
            'note' => [
                'string'
            ],
            'shipping_method' => [
                'required'
            ],
        ]; 
    }

    public function attributes()
    {
        return [

        ];
    }

    public function messages()
    {
        return [

        ];
    }

    protected function failedValidation(Validator $validator)
    {
        Toastr::error($validator->errors()->first(), 'Lỗi', ['timeOut' => 10000]);
    }
}
