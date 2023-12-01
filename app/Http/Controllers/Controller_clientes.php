<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\table_clientes;

class Controller_clientes extends Controller
{
    public function criarCliente(Request $request)
    {
        if(!$request->has('nome') || empty($request->input('nome'))){
            return response()->json(['message' => 'Nome do cliente não enviado ou vazio'], 400);    
        }

        if(!$request->has('cpf') || empty($request->input('cpf'))){
            return response()->json(['message' => 'CPF do cliente não enviado ou vazio'], 400);    
        }

        if(!$request->has('cep') || empty($request->input('cep'))){
            return response()->json(['message' => 'Cep do cliente não enviado ou vazio'], 400);    
        }

        $cliente = new table_clientes();
        $cliente->nome = $request->input('nome') ;
        $cliente->cpf = $request->input('cpf');
        $cliente->genero = $request->input('genero');
        $cliente->cep = $request->input('cep');
        $cliente->rua = $request->input('rua');
        $cliente->estado = $request->input('estado');
        $cliente->cidade = $request->input('cidade');
        if($cliente->save()){
            return response()->json(['message' => 'Cadastro realizado com sucesso'], 201);    
        }
        return response()->json(['message' => 'Erro ao realizar cadastro'], 400);
    }

    public function listarCliente()
    {
        $cliente = table_clientes::all();
        return response()->json(['message' => 'lista retornada com sucesso', 'clientes' => $cliente],201);
    }

    public function editarCliente(Request $request)
    {
        if(!$request->has('nome') || empty($request->input('nome'))){
            return response()->json(['message' => 'Nome do cliente não enviado ou vazio'], 400);    
        }

        if(!$request->has('cpf') || empty($request->input('cpf'))){
            return response()->json(['message' => 'CPF do cliente não enviado ou vazio'], 400);    
        }

        if(!$request->has('cep') || empty($request->input('cep'))){
            return response()->json(['message' => 'Cep do cliente não enviado ou vazio'], 400);    
        }

        $cliente = table_clientes::find($request->input('id'));
        $cliente->nome = $request->input('nome') ;
        $cliente->cpf = $request->input('cpf');
        $cliente->genero = $request->input('genero');
        $cliente->cep = $request->input('cep');
        $cliente->rua = $request->input('rua');
        $cliente->estado = $request->input('estado');
        $cliente->cidade = $request->input('cidade');
        if($cliente->save()){
            return response()->json(['message' => 'Cadastro editado com sucesso'], 201);    
        }
        return response()->json(['message' => 'Erro ao editar cadastro'], 400);
    }

    public function deletarCliente(Request $request)
    {
        $cliente = table_clientes::find($request->input('id'));

        if($cliente){
            if($cliente->delete()){
                return response()->json(['message' => 'Cadastro deletado com sucesso'], 201);
            }
        }
        return response()->json(['message' => 'Erro ao deletar cadastro'], 400);
    }
}
