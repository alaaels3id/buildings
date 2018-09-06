<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'       => 'required|string|max:255',
            'email'      => 'required|string|email|max:255',
            'username'   => 'required|max:255',
            'user_image' => 'mimes:jpg,png,jpeg',
            'password'   => 'string|min:6|confirmed',
        ];
    }
}
