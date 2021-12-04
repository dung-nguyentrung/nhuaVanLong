<?php

namespace App\Http\Requests;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies(['customer_create', 'customer_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');
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
            ],
            'email' => [
                'required',
                Rule::when(request()->isMethod('POST'), Rule::unique('customers', 'email')),
                Rule::when(request()->isMethod('PUT'), Rule::unique('customers', 'email')->ignore($this->customer)),
            ],
            'address' => [
                'required',
            ],
            'phone' => [
                'required',
            ],
            'company_name' => [
                'required',
            ],
            'bank_account' => [
                'nullable',
            ],
            'company_address' => [
                'required',
            ],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên khách hàng',
            'email' => 'Địa chỉ email',
            'address' => 'Địa chỉ',
            'phone' => 'Điện thoại',
            'company_name' => 'Tên công ty',
            'bank_account' => 'Tài khoản ngân hàng',
            'company_addresss' => 'Địa chỉ công ty'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được trống',
            'unique' => ':attribute đã tồn tại'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        Toastr::error($validator->errors()->first(), 'Lỗi', ['timeOut' => 10000]);
    }
}
