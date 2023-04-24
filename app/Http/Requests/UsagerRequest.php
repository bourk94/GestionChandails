<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsagerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
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
                'email'=>'required|email',
                'password'=>'required|min:8|max:64',
                'nom'=>'required|min:2|max:20',
                'prenom'=>'required|min:2|max:20',

        ];
        
    }
    public function messages(){
        return [
            'email.required'=>'L\'email est obligatoire',
            'email.email'=>'L\'email doit être valide',
            'password.required'=>'Le mot de passe est obligatoire',
            'password.min'=>'Le mot de passe doit faire au moins 8 caractères',
            'password.max'=>'Le mot de passe doit faire au plus 64 caractères',
            'nom.required'=>'Le nom est obligatoire',
            'nom.min'=>'Le nom doit faire au moins 2 caractères',
            'nom.max'=>'Le nom doit faire au plus 20 caractères',
            'prenom.required'=>'Le prénom est obligatoire',
            'prenom.min'=>'Le prénom doit faire au moins 2 caractères',
            'prenom.max'=>'Le prénom doit faire au plus 20 caractères',

        ];

    }
}
