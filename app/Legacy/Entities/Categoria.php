<?php

namespace App\Legacy\Entities;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';

    protected $primaryKey = 'id';

    function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = 'sqlite';
    }

    protected $fillable = [
        'id'
    ];
}
