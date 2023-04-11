<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampagneRequest extends FormRequest
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
            'nom_campagne' => 'required|min:2|max:50',
            'date_debut_campagne' => 'required|date',
            'date_fin_campagne' => 'required|date',
            'date_debut_collecte' => 'required|date',
            'date_fin_collecte' => 'required|date',   
            
        ];
    }
    public function messages(){
        return [
            'nom_campagne.required'=>'Le nom de la campagne est obligatoire',
            'nom_campagne.min'=>'Le nom de la campagne doit faire au moins 2 caractères',
            'nom_campagne.max'=>'Le nom de la campagne doit faire au plus 50 caractères',
            'date_debut_campagne.required'=>'La date de début de la campagne est obligatoire',
            'date_debut_campagne.date'=>'La date de début de la campagne doit être une date valide',
            'date_fin_campagne.required'=>'La date de fin de la campagne est obligatoire',
            'date_fin_campagne.date'=>'La date de fin de la campagne doit être une date valide',
            'date_debut_collecte.required'=>'La date de début de la collecte est obligatoire',
            'date_debut_collecte.date'=>'La date de début de la collecte doit être une date valide',
            'date_fin_collecte.required'=>'La date de fin de la collecte est obligatoire',
            'date_fin_collecte.date'=>'La date de fin de la collecte doit être une date valide',
        ];

    }
}
