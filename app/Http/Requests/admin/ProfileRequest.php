<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class ProfileRequest extends FormRequest
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
        $dt = new Carbon();

        $before = $dt->subYears(18)->format('Y-m-d');

        return [
            'first_name'   => 'required|string',
            'last_name'   => 'nullable|string',
//            'photo'   => '',
            'email'   => 'nullable|email|unique:admin',
//            'avatar'   => '',
            'phone'   => 'nullable',
            'date_of_birth'   => 'nullable|date|before:' . $before,
            'description'   => 'nullable|string',
            'lang_code'   => 'nullable|string',
            'currency_id'   => 'nullable|numeric',

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
            'first_name.required'             => __('The first name field is required.'),
            'first_name.string'             => __('The first name must contain a characters'),
            'last_name.string'             => __('The last name must contain a characters'),
            'email.email'             => __('The email field must be a real email'),
            'email.unique'             => __('This email already exists'),
            'date_of_birth.date'             => __('Birthdate field must be a real date'),
            'date_of_birth.before'             => __('Date of birth must be over 18 years old'),
            'description.string'             => __('The description must contain a characters'),
            'lang_code.string'             => __('The language code must contain a characters'),
            'currency_id.numeric'             => __('Choosing a real currency'),

        ];
    }
}
