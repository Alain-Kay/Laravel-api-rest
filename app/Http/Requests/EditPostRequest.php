<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class EditPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:5|max:15',
            'description' => 'required'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => true,
            'message' => 'Erreur de validation',
            'datas' => $validator->errors()
        ]));
    }

    public function messages()
    {
        return [
            'title.required' => 'le champ  titre est requis',
            'title.min' => 'Le titre doit contenir au moins 5 caracteres',
            'title.max' => "le titre ne doit pas depasser 15 caracteres",
            'description.required' => 'La description est requise'
        ];
        
    }
}
