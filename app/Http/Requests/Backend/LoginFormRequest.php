<?php

namespace App\Http\Requests\Backend;

use App\Http\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class LoginFormRequest extends FormRequest
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
            'username' => 'required',
            'password' => 'required',
        ];
    }

    /**
     * Get the validation message rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'username.required' => 'Tên đăng nhập không được để trống',
            'password.required' => 'Mật khẩu không được để trống',
        ];
    }

    /**
     * @param $validator
     * @return bool
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $userModel = User::where('username', $this->username)->first();

            if (!$userModel) {
                $validator->errors()->add('username', 'Tên đăng nhập không tồn tại.');
                return;
            }

            if (!Hash::check($this->password, $userModel->password) ) {
                $validator->errors()->add('password', 'Mật khẩu không đúng.');
                return;
            }
        });

        if ($validator->fails()) {
            Session::flash('loginError', $validator->errors());
            return false;
        }

        return true;
    }
}
