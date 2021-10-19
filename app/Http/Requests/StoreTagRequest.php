<?php

namespace App\Http\Requests;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class StoreTagRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('tag_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
                'unique:tags'
            ],
            'name_en' => [
                'required',
                'string',
                'unique:tags'
            ],
            'name_jp' => [
                'required',
                'string',
                'unique:tags'
            ]
        ];
    }

    public function attributes()
    {
        return [
            'name_vi' => 'Tên chủ đề bài viết (VI)',
            'name_en' => 'Tên chủ đề bài viết (EN)',
            'name_jp' => 'Tên chủ đề bài viết (JP)',
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
