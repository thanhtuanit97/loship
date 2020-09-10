<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class checkRegisterequest extends FormRequest
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
            'name'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'password'=>'required'
        ];
    }

    public function messages()
    {

        return [
         'name.required'=>'Họ tên không được để trống.',
        'address.required'=>'Địa Chỉ không được để trống.',
        'phone.required'=>'Số Điện Thoại không được để trống.',
        'email.required'=>'Email không được để trống.',
        'password.required'=>'Mật Khẩu không được để trống.',

        ];
       
    }
}
