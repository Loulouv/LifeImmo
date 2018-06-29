<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUpdateUser extends FormRequest
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
            'fname' => 'required|string|max:255',
            'sname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|regex:/(^0[1-8][0-9]{8}$)/',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'phone.regex' => 'Veuillez entrer votre numéro en format tout attaché',

        ];
    }
}
