<?php

namespace App\Http\Requests;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'post_category_id' => [
                'required',
                'exists:post_categories,id'
            ],
            'name_vi' => [
                'required',
                'string',
                Rule::unique('posts', 'name_vi')->ignore($this->post)
            ],
            'name_en' => [
                'required',
                'string',
                Rule::unique('posts', 'name_en')->ignore($this->post)
            ],
            'name_jp' => [
                'required',
                'string',
                Rule::unique('posts', 'name_en')->ignore($this->post)
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
            'name_vi'              => 'Tên bài viết (vi)',
            'name_en'              => 'Tên bài viết (en)',
            'name_jp'              => 'Tên bài viết (jp)',
            'short_description_vi' => 'Mô tả bài viết (vi)',
            'short_description_en' => 'Mô tả bài viết (en)',
            'short_description_jp' => 'Mô tả bài viết (jp)',
            'description_vi'       => 'Chi tiết bài viết (vi)',
            'description_en'       => 'Chi tiết bài viết (en)',
            'description_jp'       => 'Chi tiết bài viết (jp)',
            'post_category_id'     => 'Danh mục bài viết'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được trống',
            'exists'   => ':attribute không tồn tại',
            'string'   => ':attribute không đúng định dạng',
            'numeric'  => ':attribute không đúng định dạng',
            'unique'   => ':attribute đã tồn tại',     
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        Toastr::error($validator->errors()->first(), 'Lỗi', ['timeOut' => 10000]);
    }
}
