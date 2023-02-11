<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'username'          => 'required|max:16',
            'password'   => 'required|max:16',
        ];
    }

    /**
     * Get the validation messages of messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'username.required'             => __('Username field is required'),
            'username.max'             => __('Username must be less than 16 characters'),
            'password.required'             => __('Password field is required'),
            'password.max'             => __('Password must be less than 16 characters'),

        ];
    }
}
