<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $usuario = $this->route('usuario'); // Obtém o parâmetro da rota

        $emailUnico = 'unique:App\Models\User,email';

        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            if ($usuario instanceof \App\Models\User) {
                // Se $usuario for um modelo User, obtenha o ID corretamente
                $emailUnico .= ',' . $usuario->id;
            } else {
                // Se for apenas um ID (string), use diretamente
                $emailUnico .= ',' . $usuario;
            }
        }

        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', $emailUnico],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

}
