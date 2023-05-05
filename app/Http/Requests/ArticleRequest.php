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
            'description' => 'nullable|min:2|max:50',
         
            
            
        ];
    }
    public function messages(){
        return [
            'nom.required'=>'Le nom de l\'article est obligatoire',
            'nom.min'=>'Le nom de l\'article doit faire au moins 2 caractères',
            'nom.max'=>'Le nom de l\'article doit faire au plus 50 caractères',
            'description.min'=>'La description de l\'article doit faire au moins 2 caractères',
            'description.max'=>'La description de l\'article doit faire au plus 50 caractères',

        ];

    }
}
