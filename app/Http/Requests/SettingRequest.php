<?php

namespace App\Http\Requests;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'description' => [
                'required',
                'string'
            ],
            'email'          => [
                'email',
                'required'
            ],
            'phone'          => [
                'required'
            ],
            'fax'            => [
                'required'
            ],
            'address'     => [
                'required',
                'string'
            ],
            'open_time'      => [
                'required',
                'string'
            ],
        ];
    }

    public function attributes()
    {
        return [
            'description' => 'Mô tả website',
            'email' => 'Email',
            'phone' => 'Điện thoại',
            'fax' => 'Fax',
            'address' => 'Địa chỉ',
            'open_time' => 'Thời gian mở cửa',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được trống',
            'string' => ':attribute phải ở định dạng chuỗi',
            'email' => 'Bạn phải nhập đúng định dạng email'
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        Toastr::error($validator->errors()->first(), 'Lỗi', ['timeOut' => 10000]);
    }
}
