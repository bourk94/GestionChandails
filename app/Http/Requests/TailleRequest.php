<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TailleRequest extends FormRequest
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
                'grandeur'=>'required|min:2|max:7',
                'volume'=> 'nullable|min:2|max:30',
        ];
    }
    public function messages(){
        return [
            'grandeur.required'=>'La grandeur est obligatoire',
            'grandeur.min'=>'La grandeur doit faire au moins 2 caractères',
            'grandeur.max'=>'La grandeur doit faire au plus 7 caractères',
            'volume.min'=>'Le volume doit faire au moins 2 caractères',
            'volume.max'=>'Le volume doit faire au plus 30 caractères',
        ];

    }
}
