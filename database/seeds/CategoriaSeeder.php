<?php

use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Entities\Categoria::create([
            'id' => 'Eletrônicos'
        ]);

        \App\Entities\Categoria::create([
            'id' => 'Fitness'
        ]);

        \App\Entities\Categoria::create([
            'id' => 'Movél'
        ]);

        \App\Entities\Categoria::create([
            'id' => 'Eletrodomésticos'
        ]);

        \App\Entities\Categoria::create([
            'id' => 'Moda'
        ]);

        \App\Entities\Categoria::create([
            'id' => 'Perfumaria'
        ]);



    }
}
