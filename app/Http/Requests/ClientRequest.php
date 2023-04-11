<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nom_client' => 'required|min:2|max:50',
            'prenom_client' => 'required|min:2|max:50',
            'password' => 'required|min:8|max:50',
            'email' => 'required|email', 
        ];
    }
    
    public function messages()
    {
        return [
            'nom_client.required' => 'Votre nom est obligatoire',
            'nom_client.min' => 'Votre nom doit faire au moins 2 caractères',
            'nom_client.max' => 'Votre nom doit faire au plus 50 caractères',
            'prenom_client.required' => 'Le prénom est obligatoire',
            'prenom_client.min' => 'Votre prénom doit faire au moins 2 caractères',
            'prenom_client.max' => 'Votre prénom doit faire au plus 50 caractères',
            'password.required' => 'Le mot de passe est obligatoire',
            'password.min' => 'Le mot de passe doit faire au moins 8 caractères',
            'password.max' => 'Le mot de passe doit faire au plus 50 caractères',
            'email.required' => 'L\'email\courriel est obligatoire',
            'email.email' => 'L\'email doit être au format courriel',
        ];
    }

}
