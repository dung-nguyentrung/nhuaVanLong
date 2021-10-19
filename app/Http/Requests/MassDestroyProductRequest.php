<?php

namespace App\Http\Requests;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'ids'   => 'required|array',
            'ids.*' => 'exists:products,id',
        ];
    }

    public function messages()
    {
        return [
            'ids' => [
                'required' => 'Mã không được trống',
                'array' => 'Vui lòng sử dụng mảng',
            ],
            'ids.*' => [
                'exists' => 'Mã sản phẩm này không tồn tại'
            ]
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        Toastr::error($validator->errors()->first(), 'Lỗi', ['timeOut' => 100000]);
    }
}
