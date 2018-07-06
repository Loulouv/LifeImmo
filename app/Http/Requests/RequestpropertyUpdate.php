<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestpropertyUpdate extends FormRequest
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
            'address' => 'required|string|max:255',
            'cp' => 'required|regex:/(^[0-9]{5,5}$)/',
            'city' => 'required|string|max:255',
            'area' => 'required|numeric|min:1',
            'rooms' => 'required|integer|min:1',
            'name' => 'nullable|string|max:255',
            'building' => 'nullable|string|max:255',
            'floor' => 'nullable|integer',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:1',
            'furniture' => 'nullable|string|max:255',
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
        ];
    }



}
