<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetsRequest extends FormRequest
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
            'nome'=>'required|min:2|max:50',
            'raca'=>'required|min:2|max:25',
            'data_nascimento'=>'required',
            'sexo'=>'required',
            'especie'=>'required',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required'=>'O Nome é obrigatório',
            'nome.min'=>'O Nome deve conter ao menos dois caracteres',
            'nome.max'=>'O Nome deve conter no máximo 50 caracteres',
            'raca.required'=>'A raça é obrigatória',
            'raca.min'=>'A raça deve conter ao menos dois caracteres',
            'raca.max'=>'A raça deve conter no máximo 25 caracteres',
            'data_nascimento.required'=>'A data de nascimento é obrigatória',
            'sexo.required'=>'O sexo é obrigatório',
            'especie.required'=>'A espécie é obrigatória'
        ];
    }
}
