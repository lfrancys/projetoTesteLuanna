<?php

use App\Entities\Categoria;
use App\Entities\Produtos;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProdutosTest extends TestCase
{
    use WithoutMiddleware;
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $categorias = Categoria::all();

        $produto = Produtos::create(array(
            'nome'      => str_random('8'),
            'preco'     => rand(100.00, 1000.00),
            'descricao' => str_random(60),
            'idCategoria' => $categorias[rand(0, (count($categorias)-1))]->id
        ));


        $response = $this->get(route('produtos.index'));
        $this->assertEquals(200, $response->response->getStatusCode());
        $this->seeJson(['nome' => $produto->nome]);

    }

    public function testStore(){

        $categorias = Categoria::all();

        $caminhofoto = public_path().'/imagens/';
        $nomeFoto = str_random(8).'.jpg';
        $uploadFoto = new UploadedFile($caminhofoto.'vaca.jpg', $nomeFoto, 'image/jpg', filesize($caminhofoto.'vaca.jpg'), null, true);

        $produto = array(
            'nome'      => str_random('8'),
            'preco'     => rand(100.00, 1000.00),
            'descricao' => str_random(60),
            'foto'      => $caminhofoto.$nomeFoto,
            'idCategoria' => $categorias[rand(0, (count($categorias)-1))]->id
        );

        $response = $this->call('POST', route('produtos.store'), $produto, [], ['files' => $uploadFoto]);
        $jsonResponse = (object) json_decode($response->getContent(), true);

        Storage::shouldReceive('put');
        $this->assertEquals(200, $jsonResponse->status);
        $this->seeInDatabase('produtos', $produto);
    }

    public function testUpdate(){
        $categorias = Categoria::all();

        $produto = Produtos::create(array(
            'nome'      => str_random('8'),
            'preco'     => rand(100.00, 1000.00),
            'descricao' => str_random(60),
            'idCategoria' => $categorias[rand(0, (count($categorias)-1))]->id
        ));

        //Inserir no banco velho
        \App\Legacy\Entities\Produtos::create(array(
            'nome'      => $produto->nome,
            'preco'     => $produto->preco,
            'descricao' => $produto->descricao,
            'idCategoria' => $produto->idCategoria,
            'idProduto' => $produto->id
        ));

        $produtoAtualizado = array(
            'nome'      => 'Atualizado - '.$produto->nome
        );

        $response = $this->call('PUT', route('produtos.update', $produto->id), $produtoAtualizado);
        $jsonResponse = (object) json_decode($response->getContent(), true);

        $this->assertEquals(200, $jsonResponse->status);
        $this->seeInDatabase('produtos', ['nome' => $produtoAtualizado['nome']]);
    }

    public function testDelete(){
        $categorias = Categoria::all();

        $produto = Produtos::create(array(
            'nome'      => str_random('8'),
            'preco'     => rand(100.00, 1000.00),
            'descricao' => str_random(60),
            'idCategoria' => $categorias[rand(0, (count($categorias)-1))]->id
        ));

        //Inserir no banco velho
        \App\Legacy\Entities\Produtos::create(array(
            'nome'      => $produto->nome,
            'preco'     => $produto->preco,
            'descricao' => $produto->descricao,
            'idCategoria' => $produto->idCategoria,
            'idProduto' => $produto->id
        ));

        $response = $this->call('DELETE', route('produtos.destroy', $produto->id));
        $responseJson = (object)json_decode($response->getContent(), true);

        $this->assertEquals(200, $responseJson->status);
        $this->notSeeInDatabase('produtos', ['id' => $produto->id]);
    }
}

