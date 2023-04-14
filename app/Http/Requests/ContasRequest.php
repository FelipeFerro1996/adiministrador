<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContasRequest extends FormRequest
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
            'descricao'=>'required',
            'tipo_conta'=>'required'
        ];
    }

    public function messages(): array
    {
        return [
            'descricao.required'=>'O campo descrição é obrigatótio',
            'tipo_conta.required'=>'O campo tipo de conta é obrigatótio'
        ];
    }
}
