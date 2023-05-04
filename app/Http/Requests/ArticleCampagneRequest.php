<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleCampagneRequest extends FormRequest
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
            'article_id' => 'required|integer',
            'campagne_id' => 'required|integer',
            'image' => 'nullable|image',
            'couleur_id' => 'required|integer',
            'taille_id' => 'required|integer',
            'prix' => 'nullable|numeric|min:2|max:50',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'article_id.required' => 'Un article est requis',
            'article_id.integer' => 'Un article est requis',
            'campagne_id.required' => 'Une campagne est requise',
            'campagne_id.integer' => 'Une campagne est requise',
            'image.image' => 'Le fichier doit être une image',
            'couleur_id.required' => 'Une couleur est requise',
            'couleur_id.integer' => 'Une couleur est requise',
            'taille_id.required' => 'Une taille est requise',
            'taille_id.integer' => 'Une taille est requise',
            'prix'
        ];
    }
}
