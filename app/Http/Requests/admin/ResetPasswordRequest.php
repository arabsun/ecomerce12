<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'oldpwd'  => ['required', function ($attribute, $value, $fail) {
                if (!\Hash::check($value, auth('admin')->user()->password)) {
                    return $fail(__('The current password is incorrect.'));
                }
            }],
            'newpwd'   => 'required|different:oldpwd',
            'confirmpwd'   => 'required|same:newpwd',

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
            'oldpwd.required'             => __('The old password field is required.'),
            'newpwd.required'             => __('The new password field is required.'),
            'newpwd.different'             => __('The new password must be different from the old one'),
            'confirmpwd.required'             => __('The confirm new password field is required.'),
            'confirmpwd.same'             => __('The confirm new password field is required.'),
        ];
    }
}
