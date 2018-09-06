<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'bu_name'      => 'required|string|min:10|max:100',
            'bu_price'     => 'required|string|min:2|max:20',
            'bu_type'      => 'required',
            'bu_rooms'     => 'required|integer',
            'bu_rent'      => 'required|string',
            //'bu_small_dis' => 'required|string|min:102|max:130',
            'bu_square'    => 'required|integer',
            'bu_meta'      => 'required|string',
            'bu_langtude'  => 'required',
            'bu_latitude'  => 'required',
            'bu_large_dis' => 'required|string|min:20|max:255',
            //'bu_status'    => 'required|string',
            'bu_image'     => 'mimes:jpg,png,jpeg',
        ];
    }
}
