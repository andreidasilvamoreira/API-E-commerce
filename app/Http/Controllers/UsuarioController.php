<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function retornaUsuarios()
    {

        return Usuario::all();
    }

    public function criaUsuario(Request $request)
    {
        $validacao = $request->validate([
            'nome' => 'required|max:45',
            'senha' => 'required',
            'email'=>'required|max:45',
            'telefone' => 'required|max:45'
        ]);

        $usuario = Usuario::create($validacao);

        return response()->json($usuario, 201);
    }

    public function mostraUsuario($id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuario não encontrado'], 404);
        }

        return response()->json($usuario);
    }

    public function atualizaUsuario(Request $request, $id)
    {
        $validacao = $request->validate([
            'nome' => 'required|max:45',
            'senha' => 'required',
            'email'=>'required|max:45',
            'telefone' => 'required|max:45'
        ]);

        $usuario = Usuario::find($id);

        if (!$usuario){
            return response()->json(['message' => 'Usuario não encontrado'],404);
        }
        $usuario->update($validacao);

        return response()->json($usuario);
    }

    public function excluiUsuario($id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario){

            return response()->json(['message' => 'Usuario não encontrado'],404);
        }

        $usuario->delete();

        return response()->json(['message' => 'Usuario foi excluido com sucesso']);
    }
}
