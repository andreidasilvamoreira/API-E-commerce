<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function retornaProdutos()
    {
        return Produto::all();
    }

    public function criaProduto(Request $request)
    {
        $validacao = $request->validate([
            'nome' => 'required|max:45',
            'descricao' => 'required',
            'preco' => 'required|numeric',
            'estoque' => 'required|integer',
            'categoria_id' => 'required|exists:categorias,id'
        ]);

        $produto = Produto::create($validacao);
        return response()->json($produto, 201);
    }

    public function mostraProduto($id)
    {
        $produto = Produto::with(['categoria'])->find($id);

        if (!$produto){

            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        return response()->json($produto);
    }

    public function atualizaProduto(Request $request, $id)
    {
        $validacao = $request->validate([
           'nome' => 'required|max:45',
           'descricao' => 'required',
           'preco' => 'required|numeric',
           'estoque'=> 'required|integer',
           'categoria_id' => 'required|exists:categorias,id'
        ]);

        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }
        $produto->update($validacao);

        return response()->json($produto);
    }

    public function excluiProduto($id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }
        $produto->delete();

        return response()->json(['message' => 'Produto excluido com sucesso']);
    }
}
