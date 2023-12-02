<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\table_produtos;

class Controller_produtos extends Controller
{
    public function criarProduto(Request $request)
    {

        if(!$request->has('nome') || empty($request->input('nome'))){
            return response()->json(['message' => 'Nome do produto não enviado ou vazio'], 400);
        }

        if(!$request->has('sabor') || empty($request->input('sabor'))){
            return response()->json(['message' => 'Sabor do produto não enviado ou vazio'], 400);
        }

        if(!$request->has('preco') || empty($request->input('preco'))){
            return response()->json(['message' => 'Preco do produto não enviado ou vazio'], 400);
        }

        $produto = new table_produtos();
        $produto->nome_produto = $request->input('nome') ;
        $produto->sabor_produto = $request->input('sabor');
        $produto->preco = (float)$request->input('preco');
        if($produto->save()){
            return response()->json(['message' => 'Produto criado com sucesso'], 201);
        }
        return response()->json(['message' => 'Erro ao criar produto'], 400);
    }

    public function listarProdutos()
    {
        $produto = table_produtos::all();
        return response()->json(['message' => 'lista retornada com sucesso', 'produtos' => $produto],201);
    }

    public function editarProduto(Request $request)
    {
        if(!$request->has('nome') || empty($request->input('nome'))){
            return response()->json(['message' => 'Nome do produto não enviado ou vazio'], 400);
        }

        if(!$request->has('sabor') || empty($request->input('sabor'))){
            return response()->json(['message' => 'Sabor do produto não enviado ou vazio'], 400);
        }

        if(!$request->has('preco') || empty($request->input('preco'))){
            return response()->json(['message' => 'Preco do produto não enviado ou vazio'], 400);
        }

        $produto = table_produtos::find($request->input('id'));
        if(!$produto){
            return response()->json(['message' => 'Produto não encontrado'], 401);
        }

        $produto->nome_produto = $request->input('nome') ;
        $produto->sabor_produto = $request->input('sabor');
        $produto->preco = (float)$request->input('preco');
        if($produto->save()){
            return response()->json(['message' => 'Produto editado com sucesso'], 201);
        }
        return response()->json(['message' => 'Erro ao editar produto'], 400);
    }

    public function deletarProduto(Request $request)
    {
        $produto = table_produtos::find($request->input('id'));
        if(!$produto){
            return response()->json(['message' => 'Produto não encontrado'], 401);
        }

        if($produto->delete()){
            return response()->json(['message' => 'Produto deletado com sucesso'], 201);
        }

        return response()->json(['message' => 'Erro ao deletar produto'], 400);
    }
}
