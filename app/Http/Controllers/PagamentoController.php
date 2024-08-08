<?php

namespace App\Http\Controllers;

use App\Models\Pagamento;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    public function retornaPagamentos()
    {
        return Pagamento::all();
    }

    public function criaPagamento(Request $request)
    {
        $validacao = $request->validate([
            'metodo_pagamento' => 'required|string|max:255',
            'data_pagamento' => 'required|date',
            'pedido_id' => 'required|exists:pedidos,id'
        ]);

        $pagamento = Pagamento::create($validacao);

        return response()->json($pagamento, 201);
    }

    public function mostraPagamento($id)
    {
        $pagamento = Pagamento::with(['pedido'])->find($id);

        if (!$pagamento) {
            return response()->json(['message' => 'Pagamento não encontrado'],404);
        }

        return response()->json($pagamento);
    }

    public function atualizaPagamento(Request $request, $id)
    {
        $validacao = $request->validate([
            'metodo_pagamento' => 'required|string|max:255',
            'data_pagamento' => 'required|date',
            'pedido_id' => 'required|exists:pedidos,id'
        ]);

        $pagamento = Pagamento::find($id);

        if (!$pagamento) {
            return response()->json(['message' => 'Pagamento não encontrado'],404);
        }

        $pagamento->update($validacao);

        return response()->json($pagamento);
    }

    public function excluiPagamento($id)
    {
        $pagamento = Pagamento::find($id);

        if (!$pagamento) {
            return response()->json(['message' => 'Pagamento não encontrado'],404);
        }
        $pagamento->delete();

        return response()->json(['message' => 'Pagamento foi excluido com sucesso']);
    }

}
