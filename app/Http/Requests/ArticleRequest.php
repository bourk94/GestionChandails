<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'nom' => 'required|min:2|max:50',
            'type' => 'required|min:2|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ];
    }
    public function messages(){
        return [
            'nom.required'=>'Le nom de l\'article est obligatoire',
            'nom.min'=>'Le nom de l\'article doit faire au moins 2 caractères',
            'nom.max'=>'Le nom de l\'article doit faire au plus 50 caractères',
            'type.required'=>'Le type de l\'article est obligatoire',
            'type.min'=>'Le type de l\'article doit faire au moins 2 caractères',
            'type.max'=>'Le type de l\'article doit faire au plus 50 caractères',
            'image.image'=>'Le fichier doit être une image',
            'image.mimes'=>'Le fichier doit être une image de type jpeg, png, jpg, gif ou svg',
            'image.max'=>'Le fichier doit être une image de taille maximale 2048',
        ];

    }
}
