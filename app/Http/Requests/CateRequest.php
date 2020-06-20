<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CateRequest extends FormRequest
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
            'name'=>'required|unique:categories|min:3|max:16'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Bạn chưa nhập tên',
            'name.unique'=>'Tên đã tồn tại',
            'name.min'=>'Tên phải có độ dài từ 3 đến 20 ký tự',
            'name.max'=>'Tên phải có độ dài từ 3 đến 20 ký tự'
        ];
    }
}
