<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'username'=>'required|string|min:2|max:12',
            'mail'=>'required|email|min:5|max:40|unique:users,mail,'.$this->id.',id',
            'password'=>'nullable|alpha_num|min:8|max:20',
            'password_confirmation'=>'nullable|same:password',
            'bio'=>'nullable|string|max:150',
            'icon_image'=>'nullable|image|mimes:jpeg,png,bmp,gif,svg'
        ];
    }

    public function messages()
    {
        return[
            'username.required'=>'名前は必須です。',
            'username.min'=>'名前は2文字以上で入力してください。',
            'username.max'=>'名前は12文字以下で入力してください。',
            'mail.required'=>'メールアドレスは必須です。',
            'mail.email'=>'メールアドレスはメール形式で入力してください。',
            'mail.min'=>'メールアドレスは5文字以上で入力してください。',
            'mail.max'=>'メールアドレスは40文字以下で入力してください。',
            'password.alpha_num'=>'パスワードは数字またはアルファベットのみで入力してください。',
            'password.min'=>'パスワードは8文字以上で入力してください。',
            'password.max'=>'パスワードは20文字以下で入力してください。',
            'password_confirmation.same'=>'パスワードと一致しません。',
            'bio.max'=>'自己紹介文は150文字以下で入力してください。',
            // 'icon_image.alpha_num'=>'ファイル名は英数字にしてください。',
            'icon_image.mimes'=>'ファイルの拡張子はjpeg,png,bmp,gif,svgのいずれかにしてください。'
        ];
    }
}
