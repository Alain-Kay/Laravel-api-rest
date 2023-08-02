<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginUserRequest extends FormRequest
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
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
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
            'email.exists' => 'L\'email n\'existe pas',
            'email.required' => 'Email n\'existe pas',
            'email.email' => 'Email non valide',
            'password.min' => "le mot de passe doit avoir minimum 4 caracteres",
            'password.required' => 'Le password est requis'
        ];
    }
    
}
