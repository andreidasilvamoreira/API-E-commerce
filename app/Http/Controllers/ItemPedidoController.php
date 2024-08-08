<?php

namespace App\Http\Controllers;

use App\Models\ItensPedido;
use Illuminate\Http\Request;

class ItemPedidoController extends Controller
{
    public function retornaItemPedido()
    {
        return ItensPedido::all();
    }

    public function criaItemPedido(Request $request)
    {
        $validacao = $request->validate([
            'quantidade' => 'required|integer|min:1',
            'pedido_id' => 'required|exists:pedidos,id',
            'produto_id' => 'required|exists:produtos,id'
        ]);

        $itemPedido = ItensPedido::create($validacao);

        return response()->json($itemPedido);

    }

    public function mostraItemPedido($id)
    {
        $itemPedido = ItensPedido::with(['pedido', 'produto'])->find($id);

        if (!$itemPedido) {
            return response()->json(['message' => 'ItemPedido não encontrado'],404);
        }

        return response()->json($itemPedido);
    }

    public function atualizaItemPedido(Request $request, $id)
    {
        $validacao = $request->validate([
            'quantidade' => 'required|integer|min:1',
            'pedido_id' => 'required|exists:pedidos,id',
            'produto_id' => 'required|exists:produtos,id'
        ]);

        $itemPedido = ItensPedido::find($id);

        if (!$itemPedido) {
            return response()->json(['message' => 'ItemPedido não encontrado'],404);
        }

        $itemPedido->update($validacao);

        return response()->json($itemPedido);
    }

    public function excluiItemPedido($id)
    {
        $itemPedido = ItensPedido::find($id);

        if (!$itemPedido) {
            return response()->json(['message' => 'ItemPedido não encontrado'],404);
        }
        $itemPedido->delete();

        return response()->json(['message' => 'ItemPedido foi excluido com sucesso']);
    }
}
