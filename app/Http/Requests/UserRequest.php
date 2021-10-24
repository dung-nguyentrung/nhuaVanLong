<?php

namespace App\Http\Requests;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => [
                'required',
                'email'
            ],
            'address' => [
                'required',
                'string'
            ],
            'phone_number' => [
                'required',
            ]
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Họ và tên',
            'email' => 'Địa chỉ email',
            'address' => 'Địa chỉ',
            'phone_number' => 'Điện thoại'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được trống',
            'string' => ':attribute không đúng định dạng'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        Toastr::error($validator->errors()->first(), 'Lỗi', ['timeOut' => 10000]);
    }
}
