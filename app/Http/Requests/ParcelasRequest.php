<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParcelasRequest extends FormRequest
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

        // $this->input('campo_numerico') = str_replace(',', '.', $this->input('campo_numerico'));

        $valor = $this->input('valor_parcela');
        $valor_sem_virgula = str_replace(',', '.', $valor);

        return [
            'conta_id'=>'required',
            'parcelas'=>'required|numeric|gt:0',
            'valor_parcela'=>'required|numeric|gt:0',
            'Mes_Primeiro_vencimento'=>'required',
            'dia_vencimento'=>'required|numeric|between:1,30'
        ];
    }

    public function messages(): array
    {
        return [
            'conta_id.required'=>'O campo Conta é obrigatótio',
            'parcelas.required'=>'O campo Quantidade de parcelas é obrigatótio',
            'parcelas.numeric'=>'Informe apenas numeros',
            'parcelas.gt'=>'Informe um número maior do que 0',
            'dia_vencimento.numeric'=>'Informe apenas numeros',
            'dia_vencimento.between'=>'Informe um número entre 1 e 30',
            'valor_parcela.required'=>'O campo Valor da parcela é obrigatótio',
            'valor_parcela.gt'=>'Informe um valor maior do que 0',
            'dia_vencimento.required'=>'O campo dia de vencimento de parcelas é obrigatótio',
            'dia_vencimento.required'=>'O campo dia de vencimento de parcelas é obrigatótio',
            'Mes_Primeiro_vencimento.required'=>'O campo mês de vencimento de parcelas é obrigatótio'
        ];
    }
}
