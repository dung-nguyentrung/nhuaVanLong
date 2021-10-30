<?php

namespace App\Http\Requests;

use App\Rules\MatchOldPassword;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

use function PHPSTORM_META\map;

class PasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'old_password' => [
                'required',
                new MatchOldPassword()
            ],
            'password' => [
                'required',
                'min:8'
            ],
            'password_confirmation' => [
                'same:password'
            ]
        ];
    }

    public function attributes()
    {
        return [
            'old_password' => 'Mật khẩu hiện tại',
            'passowrd' => 'Mật khẩu mới',
            'password_confirmation' => 'Xác nhận mật khẩu'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được trông',
            'min' => ':attribute không được ít hơn 8 ký tự'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        Toastr::error($validator->errors()->first(), 'Lỗi', ['timeOut' => 10000]);
    }
}
