<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            // 'firstname'=>'min:3',
            // 'lastname'=>'min:3',
            'address'=>'min:3',
            'numberphone'=>'min:10|numeric',
            'email'=>'min:3|unique:customers',
        ];
    }

    public function messages()
    {
        return [
            // 'firstname.min'=>'Tên phải ít nhất có 3 ký tự',
            // 'lastname.min'=>'Họ phải ít nhất có 3 ký tự',
            'address.min'=>'Địa chỉ phải ít nhất có 3 ký tự',
            'numberphone.min'=>'Số điện thoại phải ít nhất có 10 số',
            'numberphone.numeric'=>'Số điện thoại sai',
            'email.min'=>'Email sai',
            'email.unique'=>'Email đã tồn tại',
        ];
    }
}
