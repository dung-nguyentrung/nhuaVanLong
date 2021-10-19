<?php

namespace App\Http\Requests;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
                'required'
            ],
            'phone' => [
                'required'
            ],
            'email' => [
                'email'
            ],
            'message' => [
                'required'
            ]
        ]; 
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng cho chúng tôi biết tên của quý khách !',
            'phone.required' => 'Vui lòng cho chúng tôi biết sô điện thoại của quý khách !',
            'email.email' => 'Quý khách cân nhập đúng định dạng của email',
            'message.required' => 'Vui lòng cho chúng tôi biết yêu cầu của quý khách !'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        Toastr::error($validator->errors()->first(), 'Lỗi', ['timeOut' => 100000]);
    }
}
