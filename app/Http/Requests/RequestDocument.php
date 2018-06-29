<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestDocument extends FormRequest
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
            'document' => 'required|max:10000|mimes:doc,pdf,docx,zip,application/vnd.openxmlformats-officedocument.wordprocessingml.document,jpeg,png,jpg',
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
            'document.required' => 'Veuillez insérer un fichier',
            'document.max' => 'Votre fichier ne doit pas faire plus de 10 Mo',
            'document.mimes' => 'Votre fichier peut être de type doc, pdf, docx, zip, jpeg, png, jpg ou word',
        ];
    }

}
