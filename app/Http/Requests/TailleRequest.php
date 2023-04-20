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
                'format'=>'required|min:2|max:7',

        ];
    }
    public function messages(){
        return [
            'format.required'=>'La grandeur ou le format est obligatoire',
            'format.min'=>'La grandeur ou le format doit faire au moins 2 caractères',
            'format.max'=>'La grandeur ou le format doit faire au plus 7 caractères',

        ];

    }
}
