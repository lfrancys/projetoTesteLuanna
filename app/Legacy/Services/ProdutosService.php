<?php
namespace App\Legacy\Services;

use Illuminate\Database\DatabaseManager;
use App\Legacy\Entities\Produtos;
use Illuminate\Database\Eloquent\Model;
use App\Services\ServiceAbstract;

class ProdutosService extends ServiceAbstract {

    protected function makeEntity():Model{
        return app(Produtos::class);
    }

}