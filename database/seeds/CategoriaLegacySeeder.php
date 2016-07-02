<?php

use Illuminate\Database\Seeder;

class CategoriaLegacySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Legacy\Entities\Categoria::create([
            'id' => 'Eletrônicos'
        ]);

        \App\Legacy\Entities\Categoria::create([
            'id' => 'Fitness'
        ]);

        \App\Legacy\Entities\Categoria::create([
            'id' => 'Movél'
        ]);

        \App\Legacy\Entities\Categoria::create([
            'id' => 'Eletrodomésticos'
        ]);

        \App\Legacy\Entities\Categoria::create([
            'id' => 'Moda'
        ]);

        \App\Legacy\Entities\Categoria::create([
            'id' => 'Perfumaria'
        ]);

    }
}
