<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:100',
            'phone' => 'required|max:15|min:8',
            'address' => 'required|max:255',
            'comment' => 'max:500',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên của ban',
            'name.max' => 'Tên không quá 255 ký tự',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'email.max' => 'Email không quá 100 ký tự',
            'phone.required' => 'Vui lòng nhập SDT',

            'phone.max' => 'SDT tối đa 15 số',
            'phone.min' => 'SDT tối thiểu 9 số',
            'address.max' => 'Địa chỉ tối đa 255 ký tự',
            'comment.max' => 'Ghi chú tối đa 500 ký tự',
        ];
    }
}
