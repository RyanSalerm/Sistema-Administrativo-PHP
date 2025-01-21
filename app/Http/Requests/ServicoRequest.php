<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ServicoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => ['required', 'min:2', 'max:255'],
            'icone' => ['required', Rule::in(['twf-cleaning-1', 'twf-cleaning-2', 'twf-cleaning-3'])],
            'posicao' => ['required', 'integer', 'min:1', 'max:99'],
            'valor_minimo' => ['required', 'numeric'],
            'quantidade_horas' => ['required', 'integer', 'min:1', 'max:8'],
            'porcentagem' => ['required', 'integer', 'min:1', 'max:99'],
            'valor_quarto' => ['required', 'numeric'],
            'horas_quarto' => ['required', 'integer', 'min:1', 'max:8'],
            'valor_sala' => ['required', 'numeric'],
            'horas_sala' => ['required', 'integer', 'min:1', 'max:8'],
            'valor_banheiro' => ['required', 'numeric'],
            'horas_banheiro' => ['required', 'integer', 'min:1', 'max:8'],
            'valor_cozinha' => ['required', 'numeric'],
            'horas_cozinha' => ['required', 'integer', 'min:1', 'max:8'],
            'valor_quintal' => ['required', 'numeric'],
            'horas_quintal' => ['required', 'integer', 'min:1', 'max:8'],
            'valor_outros' => ['required', 'numeric'],
            'horas_outros' => ['required', 'integer', 'min:1', 'max:8']
        ];
    }

    /**
     * Substitui os valores antes da validação
     *
     * @return array
     */
    public function validationData()
    {
        $dados = $this->all();

        foreach (['valor_minimo', 'valor_quarto', 'valor_sala', 'valor_banheiro', 'valor_cozinha', 'valor_quintal', 'valor_outros'] as $campo) {
            if (isset($dados[$campo]) && is_string($dados[$campo])) {
                $dados[$campo] = $this->formataValorMonetario($dados[$campo]);
            }
        }

        $this->replace($dados);

        return $dados;
    }

    /**
     * Formata o valor do padrão brasileiro para o padrão internacional
     *
     * @param string $valor
     * @return string
     */
    protected function formataValorMonetario(string $valor): string
    {
        return str_replace(['.', ','], ['', '.'], $valor);
    }
}
