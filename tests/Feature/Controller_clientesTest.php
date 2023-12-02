<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use App\Models\table_clientes;
use Tests\TestCase;
use GuzzleHttp\Client;

class Controller_clientesTest extends TestCase
{

    public function testCriarClientes()
    {
        $client = new Client();
        $response = $client->post('http://localhost:8000/api/pontue/cliente/criar', [
            'json' => [
                'nome' => "Matheus Ap",
                'cpf' => "43434265234",
                'genero' => "Masculino",
                'cep' => "12345-10",
                'rua' => "Rua 123a",
                'estado' => "São Paulo",
                'cidade' => "Mogi das Cruzes",
            ],
        ]);

        $statusCode = $response->getStatusCode();
        $responseData = json_decode($response->getBody(), true);

        // Realize as asserções conforme necessário
        $this->assertEquals(201, $statusCode);
        $this->assertArrayHasKey('message', $responseData);
        $this->assertEquals("Cadastro realizado com sucesso", $responseData['message']);
    }


    public function testEditarClientes()
    {
        $cliente = new table_clientes();
        $cliente->nome = "Thiago AP";
        $cliente->cpf = "12345678910";
        $cliente->genero = "Masculino";
        $cliente->cep = "12345-61";
        $cliente->rua = "Rua da ladeira";
        $cliente->estado = "São Paulo";
        $cliente->cidade = "Suzano";
        $cliente->save();

        $client = new Client();
        $response = $client->post("http://localhost:8000/api/pontue/cliente/editar", [
            'json' => [
                'id' => $cliente->id,
                'nome' => "Thiago Ap",
                'cpf' => "12314567860",
                'genero' => "Masculino",
                'cep' => "54321-10",
                'rua' => "Rua da subida",
                'estado' => "São Paulo",
                'cidade' => "Ferraz de Vasconcelos",
            ],
        ]);


        $statusCode = $response->getStatusCode();
        $responseData = json_decode($response->getBody(), true);

        // Realize as asserções conforme necessário
        $this->assertEquals(201, $statusCode);
        $this->assertArrayHasKey('message', $responseData);
        $this->assertEquals("Cadastro editado com sucesso", $responseData['message']);
    }

    public function testListarClentes()
    {
        $client = new Client();
        $response = $client->get('http://localhost:8000/api/pontue/cliente/listar');

        $statusCode = $response->getStatusCode();
        $responseData = json_decode($response->getBody(), true);

        // Realize as asserções conforme necessário
        $this->assertEquals(201, $statusCode);
        $this->assertArrayHasKey('message', $responseData);
        $this->assertArrayHasKey('clientes', $responseData);
        $this->assertEquals("lista retornada com sucesso", $responseData['message']);
    }

    public function testExcluirClientes()
    {
        $cliente = new table_clientes();
        $cliente->nome = "Leo AP";
        $cliente->cpf = "12345678910";
        $cliente->genero = "Masculino";
        $cliente->cep = "12345-61";
        $cliente->rua = "Rua da ladeira";
        $cliente->estado = "São Paulo";
        $cliente->cidade = "Suzano";
        $cliente->save();

        $client = new Client();
        $response = $client->delete("http://localhost:8000/api/pontue/cliente/deletar",[
            'json' => [
                'id' => $cliente->id
            ],
        ]);

        $statusCode = $response->getStatusCode();
        $responseData = json_decode($response->getBody(), true);

        // Realize as asserções conforme necessário
        $this->assertEquals(201, $statusCode);
        $this->assertArrayHasKey('message', $responseData);
        $this->assertEquals("Cadastro deletado com sucesso", $responseData['message']);
    }
}
