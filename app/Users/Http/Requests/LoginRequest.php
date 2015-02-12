<?php namespace TGL\Members\Http\Requests;


use TGL\Core\Http\Requests\Request;

class LoginRequest extends Request
{
    public function rules()
    {
        return [
            'username' => 'required|',
            'password' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }
}