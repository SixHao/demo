<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserInsertRequest extends Request
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
            //
            'username' => 'unique:husers|regex:/^\w{4,18}$/',
            'password'=>'required',
            'repassword'=>'required|same:password',
            'phone'=>'unique:husers|regex:/^1[35784]\d{9}$/',
            'email'=>"unique:husers|email"
        ];
    }

    public function messages()
    {
        return [
            'username.required'=>'用户名必填',
            'username.unique'=>'用户名已存在',
            'username.regex'=>'用户名格式错误',
            'password.required'=>'密码必填',
            'repassword.required'=>'确认密码必填',
            'repassword.same'=>'俩次密码不一致',
            'phone.required'=>'手机号必填',
            'phone.unique'=>'手机号已存在',
            'phone.regex'=>'手机号格式不正确',
            'email.required'=>'邮箱必填',
            'email.unique'=>'邮箱已存在',
            'email.email'=>'邮箱格式不正确',
        ];
    }
}
