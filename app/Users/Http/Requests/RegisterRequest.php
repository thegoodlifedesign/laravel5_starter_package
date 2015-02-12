<?php namespace TGL\Members\Http\Requests;

use TGL\Core\Http\Requests\Request;

class RegisterRequest extends Request
{
    public function rules()
    {
        return [
            'username' => 'required|unique:members',
            'email' => 'required|email|unique:members',
            'full_name' => 'required',
            'password' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }
}