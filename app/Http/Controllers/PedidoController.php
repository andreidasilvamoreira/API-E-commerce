<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function retornaPedidos()
    {
        return Pedido::all();
    }

    public function criaPedido(Request $request)
    {
        $validacao = $request->validate([
            'status' => 'required|string|max:255',
            'total' => 'required|numeric',
            'data_criacao' => 'required|date',
            'data_atualizacao' => 'required|date',
            'usuario_id' => 'required|exists:usuarios,id'
        ]);

        $pedido = Pedido::create($validacao);
        return response()->json($pedido, 201);
    }

    public function mostraPedido($id)
    {
        $pedido = Pedido::with(['usuario'])->find($id);

        if (!$pedido) {
            return response()->json(['message' => 'Pedido não encontrado'],404);
        }

        return response()->json($pedido);
    }

    public function atualizaPedido(Request $request, $id)
    {
        $validacao = $request->validate([
            'status' => 'required|in:pendente,processando,concluído,cancelado',
            'total' => 'required|numeric',
            'data_criacao' => 'required|date',
            'data_atualizacao' => 'required|date',
            'usuario_id' => 'required|exists:usuarios,id'
        ]);

        $pedido = Pedido::find($id);

        if (!$pedido) {
            return response()->json(['message', 'Pedido não encontrado'],404);
        }
        $pedido->update($validacao);
        return response()->json($pedido);
    }

    public function excluiPedido($id)
    {
        $pedido = Pedido::find($id);

        if (!$pedido) {
            return response()->json(['message' => 'Pedido não encontrado'],404);
        }

        $pedido->delete();

        return response()->json(['message' => 'Pedido foi excluido com sucesso']);
    }
}
