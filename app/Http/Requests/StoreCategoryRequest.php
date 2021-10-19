<?php

namespace App\Http\Requests;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'name_vi' => [
                'required',
                'string',
                'unique:categories'
            ],
            'name_en' => [
                'required',
                'string',
                'unique:categories'
            ],
            'name_jp' => [
                'required',
                'string',
                'unique:categories'
            ],
            'description_vi' => [
                'required'
            ],
            'description_en' => [
                'required'
            ],
            'description_jp' => [
                'required'
            ]
        ];
    }

    public function attributes()
    {
        return [
            'name_vi' => 'Tên danh mục (VI)',
            'name_en' => 'Tên danh mục (EN)',
            'name_jp' => 'Tên danh mục (JP)',
            'name_vi' => 'Mô tả danh mục (VI)',
            'name_en' => 'Mô tả danh mục (EN)',
            'name_jp' => 'Mô tả danh mục (JP)',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được trống !',
            'string' => ":attribute không đúng định dạng",
            'unique' => "::attribute đã tồn tại"
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        Toastr::error($validator->errors()->first(), 'Lỗi', ['timeOut' => 10000]);
    }
}
