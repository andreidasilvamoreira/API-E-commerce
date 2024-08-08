<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EnderecoEntregaController;
use App\Http\Controllers\ItemPedidoController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/categorias', [CategoriaController::class, 'retornaCategorias']);
Route::get('/categoria/{id}', [CategoriaController::class, 'mostraCategoria']);
Route::post('/categoria', [CategoriaController::class, 'criaCategoria']);
Route::put('/categoria/{id}', [CategoriaController::class, 'atualizaCategoria']);
Route::delete('/categoria/{id}', [CategoriaController::class, 'excluiCategoria']);

Route::get('/endereçosEntregas', [EnderecoEntregaController::class, 'retornaEnderecoEntrega']);
Route::get('/endereçosEntrega/{id}', [EnderecoEntregaController::class, 'mostraEnderecoEntrega']);
Route::post('/endereçosEntrega', [EnderecoEntregaController::class, 'criaEnderecoEntrega']);
Route::put('/endereçosEntrega/{id}', [EnderecoEntregaController::class, 'atualizaEnderecoEntrega']);
Route::delete('/endereçosEntrega/{id}', [EnderecoEntregaController::class, 'excluiEnderecoEntrega']);


Route::get('/itensPedidos', [ItemPedidoController::class, 'retornaItemPedido']);
Route::get('/itensPedido/{id}', [ItemPedidoController::class, 'mostraItemPedido']);
Route::post('/itensPedido', [ItemPedidoController::class, 'criaItemPedido']);
Route::put('/itensPedido/{id}', [ItemPedidoController::class, 'atualizaItemPedido']);
Route::delete('/itensPedido/{id}', [ItemPedidoController::class, 'excluiItemPedido']);


Route::get('/pagamentos', [PagamentoController::class, 'retornaPagamentos']);
Route::get('/pagamento/{id}', [PagamentoController::class, 'mostraPagamento']);
Route::post('/pagamento', [PagamentoController::class, 'criaPagamento']);
Route::put('/pagamento/{id}', [PagamentoController::class, 'atualizaPagamento']);
Route::delete('/pagamento/{id}', [PagamentoController::class, 'excluiPagamento']);

Route::get('/pedidos', [PedidoController::class, 'retornaPedidos']);
Route::get('/pedido/{id}', [PedidoController::class, 'mostraPedido']);
Route::post('/pedido', [PedidoController::class, 'criaPedido']);
Route::put('/pedido/{id}', [PedidoController::class, 'atualizaPedido']);
Route::delete('/pedido/{id}', [PedidoController::class, 'excluiPedido']);

Route::get('/produtos', [ProdutoController::class, 'retornaProdutos']);
Route::get('/produto/{id}', [ProdutoController::class, 'mostraProduto']);
Route::post('/produto', [ProdutoController::class, 'criaProduto']);
Route::put('/produto/{id}', [ProdutoController::class, 'atualizaProduto']);
Route::delete('/produto/{id}', [ProdutoController::class, 'excluiProduto']);

Route::get('/usuarios', [UsuarioController::class, 'retornaUsuarios']);
Route::get('/usuario/{id}', [UsuarioController::class, 'mostraUsuario']);
Route::post('/usuario', [UsuarioController::class, 'criaUsuario']);
Route::put('/usuario/{id}', [UsuarioController::class, 'atualizaUsuario']);
Route::delete('/usuario/{id}', [UsuarioController::class, 'excluiUsuario']);
