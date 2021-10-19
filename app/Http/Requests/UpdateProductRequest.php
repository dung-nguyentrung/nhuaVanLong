<?php

namespace App\Http\Requests;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'name_vi' => [
                'required',
                'string',
                Rule::unique('products', 'name_vi')->ignore($this->product)
            ],
            'name_en' => [
                'required',
                'string',
                Rule::unique('products', 'name_en')->ignore($this->product)
            ],
            'name_jp' => [
                'required',
                'string',
                Rule::unique('products', 'name_en')->ignore($this->product)
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
            'short_description_vi' => [
                'required',
                'string'
            ],
            'short_description_en' => [
                'required',
                'string'
            ],
            'short_description_jp' => [
                'required',
                'string'
            ],
            'description_vi' => [
                'required',
                'string'
            ],
            'description_en' => [
                'required',
                'string'
            ],
            'description_jp' => [
                'required',
                'string'
            ],
        ];
    }

    public function attributes()
    {
        return [
            'name_vi' => 'Tên sản phẩm (vi)',
            'name_en' => 'Tên sản phẩm (en)',
            'name_jp' => 'Tên sản phẩm (jp)',
            'category_id' => 'Danh mục',
            'weight' => 'Trọng lượng',
            'color' => 'Màu sắc',
            'capacity' => 'Dung tích',
            'cycle' => 'Chu kỳ sản xuất',
            'quantity' => 'Số lượng',
            'price' => 'Giá',
            'short_description_vi' => 'Mô tả sản phẩm (vi)',
            'short_description_en' => 'Mô tả sản phẩm (en)',
            'short_description_jp' => 'Mô tả sản phẩm (jp)',
            'description_vi' => 'Chi tiết sản phẩm (vi)',
            'description_en' => 'Chi tiết sản phẩm (en)',
            'description_jp' => 'Chi tiết sản phẩm (jp)',
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
