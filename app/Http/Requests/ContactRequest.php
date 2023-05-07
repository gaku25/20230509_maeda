<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'fullname'=>'required|string|max:255',
            'email'=>'required|email|max:255|unique:users,email',
            'postcode'=>'required|max:8',
            'address'=>'required|max:255',
            'building_name'=>'max:255',
            'opinion'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => '・名前は必須です',
            'fullname.max'  => '・名前は255文字以内で入力してください',
            'email.required'=>'・メールアドレスは必須です',
            'email.email' => 'メールアドレスの形式で入力してください',
            'email.max' => '・メールアドレスは255文字以内で入力してください',
            'email.unique'=>'・このメールアドレスは登録済みです',
            'postcode.required'=>'・郵便番号は必須です',
            'postcode.max' => '・郵便番号は8文字以内入力してください',
            'address.required'=>'・住所は必須です',
            'address.max' => '・住所は255文字以内入力してください',
            'building_name.max' => '・建物名は255文字以内で入力してください',
            'opinion.required'=>'・ご意見は必須です',
        ];
    }
}
