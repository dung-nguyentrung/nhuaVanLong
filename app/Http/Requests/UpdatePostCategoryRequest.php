<?php

namespace App\Http\Requests;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class UpdatePostCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('post_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
                Rule::unique('post_categories', 'name_vi')->ignore($this->post_category),
            ],
            'name_en' => [
                'required',
                'string',
                Rule::unique('post_categories', 'name_en')->ignore($this->post_category),
            ],
            'name_jp' => [
                'required',
                'string',
                Rule::unique('post_categories', 'name_jp')->ignore($this->post_category),
            ]
        ];
    }

    public function attributes()
    {
        return [
            'name_vi' => 'Tên danh mục bài viết (VI)',
            'name_en' => 'Tên danh mục bài viết (EN)',
            'name_jp' => 'Tên danh mục bài viết (JP)',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được trống !',
            'string' => ":attribute không đúng định dạng",
            'unique' => ":attribute đã tồn tại"
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        Toastr::error($validator->errors()->first(), 'Lỗi', ['timeOut' => 10000]);
    }
}
