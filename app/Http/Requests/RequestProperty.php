<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProperty extends FormRequest
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
            'addresse' => 'required|string|max:255',
            'cp' => 'required|regex:/(^[0-9]{5,5}$)/',
            'city' => 'required|string|max:255',
            'surface' => 'required|numeric|min:1/',
            'room' => 'required|integer|min:1',  
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
            'addresse.required' => 'Veuillez entrer l\'adresse du bien',
            'cp.required' => 'Veiller entrer le code postal de votre bien',
            'cp.regex' => 'Veiller entrer un code postal valide : exemple 10000',
            //'room' => 'Veillez entrer le nombre de pièces de votre appartement : exemple 2',
        ];
    }

}
