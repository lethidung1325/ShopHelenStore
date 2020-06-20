<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'title'=>'unique:products|min:3',
            'price'=>'min:3',
            'content'=>'min:3',
            // 'image'=>'image',
        ];
    }

    public function messages()
    {
        return [
            'title.unique'=>'Tên đã tồn tại',
            'title.min'=>'Tên phải có độ dài ít nhất 3 ký tự',
            'price.min'=>'Giá phải có độ dài ít nhất 3 ký tự',
            'content.min'=>'Nội dung phải có độ dài ít nhất 3 ký tự',
            // 'image.image'=>'Bạn chỉ có thể chọn file jpg, png hoặc jpeg',
        ];
    }
}
