<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResgisterRequest extends FormRequest
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
            'name' =>'required|min:5|string',
            'email' =>'required|unique:users,email|',
            'password' => 'required|min:6|alpha_num'
        ];
    }
}