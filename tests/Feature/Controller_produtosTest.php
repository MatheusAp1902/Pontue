<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use App\Models\table_produtos;
use Tests\TestCase;
use GuzzleHttp\Client;

class Controller_produtosTest extends TestCase
{

    public function testCriarProduto()
    {
        $client = new Client();
        $response = $client->post('http://localhost:8000/api/pontue/produto/criar', [
            'json' => [
                'nome' => 'Bombom no pote',
                'sabor' => 'Uva',
                'preco' => 10.99,
            ],
        ]);

        $statusCode = $response->getStatusCode();
        $responseData = json_decode($response->getBody(), true);

        // Realize as asserções conforme necessário
        $this->assertEquals(201, $statusCode);
        $this->assertArrayHasKey('message', $responseData);
        $this->assertEquals("Produto criado com sucesso", $responseData['message']);
    }


    public function testEditarProduto()
    {
        $produto = new table_produtos();
        $produto->nome_produto = "Bombom de laranja" ;
        $produto->sabor_produto = "laranja";
        $produto->preco = (float)4.99;
        $produto->save();

        $client = new Client();
        $response = $client->post("http://localhost:8000/api/pontue/produto/editar", [
            'json' => [
                'id' => $produto->id,
                'nome' => 'Trufa',
                'sabor' => 'Brigadeiro',
                'preco' => (float)3.99,
            ],
        ]);


        $statusCode = $response->getStatusCode();
        $responseData = json_decode($response->getBody(), true);

        // Realize as asserções conforme necessário
        $this->assertEquals(201, $statusCode);
        $this->assertArrayHasKey('message', $responseData);
        $this->assertEquals("Produto editado com sucesso", $responseData['message']);
    }

    public function testListarProdutos()
    {
        $client = new Client();
        $response = $client->get('http://localhost:8000/api/pontue/produto/listar');

        $statusCode = $response->getStatusCode();
        $responseData = json_decode($response->getBody(), true);

        // Realize as asserções conforme necessário
        $this->assertEquals(201, $statusCode);
        $this->assertArrayHasKey('message', $responseData);
        $this->assertArrayHasKey('produtos', $responseData);
        $this->assertEquals("lista retornada com sucesso", $responseData['message']);
    }

    public function testExcluirProduto()
    {
        $produto = new table_produtos();
        $produto->nome_produto = "Bombom de maça" ;
        $produto->sabor_produto = "Maça";
        $produto->preco = (float)3.99;
        $produto->save();

        $client = new Client();
        $response = $client->delete("http://localhost:8000/api/pontue/produto/deletar",[
            'json' => [
                'id' => $produto->id
            ],
        ]);

        $statusCode = $response->getStatusCode();
        $responseData = json_decode($response->getBody(), true);

        // Realize as asserções conforme necessário
        $this->assertEquals(201, $statusCode);
        $this->assertArrayHasKey('message', $responseData);
        $this->assertEquals("Produto deletado com sucesso", $responseData['message']);
    }
}
