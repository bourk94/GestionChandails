<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UsagerRequest extends FormRequest
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
                'email'=> 'required','email:rfc,dns','unique:usagers,email,'. $this->id,
                'password'=> [($this->id ? 'nullable' : 'required'), 'confirmed', 'max:64', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
                'nom'=>'required|min:2|max:30',
                'prenom'=>'required|min:2|max:30',
        ];      
    }

    public function messages(){
        return [
            'email.required'=>'L\'email est obligatoire',
            'email.email'=>'L\'email doit être valide',
            'email.unique'=>'L\'email est déjà utilisé',
            'password.required'=>'Le mot de passe est obligatoire',
            'password.min'=>'Le mot de passe doit faire au moins 8 caractères',
            'password.max'=>'Le mot de passe doit faire au plus 64 caractères',
            'password.confirmed'=>'Les mots de passe ne correspondent pas',
            'nom.required'=>'Le nom est obligatoire',
            'nom.min'=>'Le nom doit faire au moins 2 caractères',
            'nom.max'=>'Le nom doit faire au plus 30 caractères',
            'prenom.required'=>'Le prénom est obligatoire',
            'prenom.min'=>'Le prénom doit faire au moins 2 caractères',
            'prenom.max'=>'Le prénom doit faire au plus 30 caractères',
        ];
    }
}
