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
            'name' => [
                'required',
                'string',
                Rule::unique('posts', 'name')->ignore($this->post)
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
            'name'              => 'Tên bài viết',
            'short_description' => 'Mô tả bài viết',
            'description'       => 'Chi tiết bài viết',
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
