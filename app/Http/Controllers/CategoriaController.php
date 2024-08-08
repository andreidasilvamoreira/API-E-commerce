<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function retornaCategorias()
    {
        return Categoria::all();
    }

    public function criaCategoria(Request $request)
    {
        $validacao = $request->validate([
            'nome' => 'required|max:45',
            'descricao' => 'required'
        ]);

        $categoria = Categoria::create($validacao);

        return response()->json($categoria);
    }

    public function mostraCategoria($id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return response()->json(['message' => 'Categoria não encontrada'],404);
        }

        return response()->json($categoria);
    }

    public function atualizaCategoria(Request $request, $id)
    {
        $validacao = $request->validate([
            'nome' => 'required|max:45',
            'descricao' => 'required'
        ]);

        $categoria = Categoria::find($id);

        if (!$categoria) {
            return response()->json(['message' => 'Categoria não encontrada'],404);
        }

        $categoria->update($validacao);

        return response()->json($categoria);
    }

    public function excluiCategoria($id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return response()->json(['message' => 'Categoria não encontrada'],404);
        }

        $categoria->delete();

        return response()->json(['message' => 'Categoria foi excluido com sucesso']);
    }
}
