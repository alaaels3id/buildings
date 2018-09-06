<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUsersAdminRequest extends FormRequest
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
            'user_image' => 'memis:jpg,png,jpeg',
            'password'   => 'required|string|min:6|confirmed',
        ];
    }
}
