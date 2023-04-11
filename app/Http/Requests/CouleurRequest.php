<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouleurRequest extends FormRequest
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
                'nom_couleur'=>'required|min:2|max:50',
                'code_couleur'=> 'required|min:7|max:7',
        ];
        
    }
    public function messages(){
        return [
            'nom_couleur.required'=>'Le nom de la couleur est obligatoire',
            'nom_couleur.min'=>'Le nom de la couleur doit faire au moins 2 caractères',
            'nom_couleur.max'=>'Le nom de la couleur doit faire au plus 50 caractères',
            'code_couleur.required'=>'Le code de la couleur est obligatoire',
            'code_couleur.min'=>'Le code de la couleur doit faire au moins 7 caractères et commence par #',
            'code_couleur.max'=>'Le code de la couleur doit faire au plus 7 caractères',
        ];

    }
    
}
