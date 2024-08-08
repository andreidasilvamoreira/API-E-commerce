<?php

namespace App\Http\Controllers;

use App\Models\EnderecosEntrega;
use Illuminate\Http\Request;

class EnderecoEntregaController extends Controller
{
    public function retornaEnderecoEntrega()
    {
        return EnderecosEntrega::all();
    }

    public function criaEnderecoEntrega(Request $request)
    {
        $validacao = $request->validate([
            'rua' => 'required|string|max:255',
            'bairro' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'cep' => 'required|string|max:10',
            'usuario_id' => 'required|exists:usuarios,id'
        ]);
        $enderecoEntrega = EnderecosEntrega::create($validacao);

        return response()->json($enderecoEntrega);
    }

    public function mostraEnderecoEntrega($id)
    {
        $enderecoEntrega = EnderecosEntrega::with(['usuario'])->find($id);

        if (!$enderecoEntrega) {
            return response()->json(['message' => 'EnderecoEntrega não encontrado'],404);
        }

        return response()->json($enderecoEntrega);
    }

    public function atualizaEnderecoEntrega(Request $request, $id)
    {
        $validacao = $request->validate([
            'rua' => 'required|string|max:255',
            'bairro' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'cep' => 'required|string|max:10',
            'usuario_id' => 'required|exists:usuarios,id'
        ]);

        $enderecoEntrega = EnderecosEntrega::find($id);

        if (!$enderecoEntrega){
            return response()->json(['message' => 'EnderecoEntrega não encontrado'],404);
        }

        $enderecoEntrega->update($validacao);

        return response()->json($enderecoEntrega);
    }

    public function excluiEnderecoEntrega($id)
    {
        $enderecoEntrega = EnderecosEntrega::find($id);

        if (!$enderecoEntrega) {
            return response()->json(['message' => 'EnderecoEntrega não encontrado'],404);
        }

        $enderecoEntrega->delete();

        return response()->json(['message' => 'EnderecoEntrega foi excluido com sucesso']);
    }
}
