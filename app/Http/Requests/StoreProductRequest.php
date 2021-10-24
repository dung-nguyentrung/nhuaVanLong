<?php

namespace App\Http\Requests;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'category_id' => [
                'required',
                'exists:categories,id'
            ],
            'name' => [
                'required',
                'string',
                'unique:products'
            ],
            'capacity' => [
                'required',
                'numeric'
            ],
            'weight' => [
                'required',
                'numeric'
            ],
            'color' => [
                'required'
            ],
            'cycle' => [
                'required'
            ],
            'quantity' => [
                'required',
                'numeric'
            ],
            'price' => [
                'required',
                'numeric'
            ],
            'short_description' => [
                'required',
                'string'
            ],
            'description' => [
                'required',
                'string'
            ],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên sản phẩm',
            'category_id' => 'Danh mục',
            'weight' => 'Trọng lượng',
            'color' => 'Màu sắc',
            'capacity' => 'Dung tích',
            'cycle' => 'Chu kỳ sản xuất',
            'quantity' => 'Số lượng',
            'price' => 'Giá',
            'short_description' => 'Mô tả sản phẩm',
            'description' => 'Chi tiết sản phẩm',
            'category_id'     => 'Danh mục sản phẩm'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được trống',
            'exists' => ':attribute không tồn tại',
            'string' => ':attribute không đúng định dạng',
            'numeric' => ':attribute không đúng định dạng',
            'unique' => ':attribute đã tồn tại',    
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        Toastr::error($validator->errors()->first(), 'Lỗi', ['timeOut' => 10000]);
    }
}
