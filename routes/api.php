<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller_produtos;
use App\Http\Controllers\Controller_clientes;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('api')->group(function () {
    Route::get('/hello', function () {
        return response()->json(['message' => 'Hello, World!']);
    });
    Route::post('/pontue/produto/criar', [Controller_produtos::class, 'criarProduto']);
    Route::get('/pontue/produto/listar', [Controller_produtos::class, 'listarProdutos']);
    Route::post('/pontue/produto/editar', [Controller_produtos::class, 'editarProduto']);
    Route::delete('/pontue/produto/deletar', [Controller_produtos::class, 'deletarProduto']);

    Route::post('/pontue/cliente/criar', [Controller_clientes::class, 'criarCliente']);
    Route::get('/pontue/cliente/listar', [Controller_clientes::class, 'listarCliente']);
    Route::post('/pontue/cliente/editar', [Controller_clientes::class, 'editarCliente']);
    Route::delete('/pontue/cliente/deletar', [Controller_clientes::class, 'deletarCliente']);
});