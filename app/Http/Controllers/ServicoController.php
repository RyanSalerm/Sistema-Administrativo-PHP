<?php

namespace App\Http\Controllers;
use App\Http\Requests\ServicoRequest;
use Illuminate\Http\Request;
use App\Models\Servico;

class ServicoController extends Controller
{

    public function index()
    {
        $servicos = Servico::Paginate(15);

        return view('servicos.index')->with('servicos', $servicos);
    }

    public function create()
    {
        return view('servicos.create');
    }

    public function store(ServicoRequest $request)
    {
        /*validated = $request->validate([
            'nome' => 'required|string|max:255',
            'icone' => 'nullable|string|max:255',
            'posicao' => 'nullable|integer',
            'valor_minimo' => 'nullable|numeric',
            'quantidade_horas' => 'nullable|integer',
            'porcentagem' => 'nullable|numeric',
            'valor_quarto' => 'nullable|numeric',
            'horas_quarto' => 'nullable|integer',
            'valor_sala' => 'nullable|numeric',
            'horas_sala' => 'nullable|integer',
            'valor_banheiro' => 'nullable|numeric',
            'horas_banheiro' => 'nullable|integer',
            'valor_cozinha' => 'nullable|numeric',
            'horas_cozinha' => 'nullable|integer',
            'valor_quintal' => 'nullable|numeric',
            'horas_quintal' => 'nullable|integer',
            'valor_outros' => 'nullable|numeric',
            'horas_outros' => 'nullable|integer',
        ])*/
        $validated = $request->except('_token');
        Servico::create($validated);
        return redirect()->route('servicos.index')->with('mensagem', 'Serviço cadastrado com sucesso!');
    }

    public function edit(Servico $servico)
    {
        return view('servicos.edit')->with('servico', $servico);
        //$servico = Servico::findOrFail($id); //pode ser útil
    }

    public function update(Servico $servico, ServicoRequest $request)
    {
        // Pega todos os dados do formulário, exceto os campos '_token' e '_method'
        $dados = $request->except(['_token', '_method']);

        // Atualiza o modelo 'Servico' com os dados vindos do formulário
        $servico->update($dados);

        // Redireciona para a lista de serviços com uma mensagem de sucesso
        return redirect()->route('servicos.index')
            ->with('mensagem', 'Serviço atualizado com sucesso!');
    }
}
