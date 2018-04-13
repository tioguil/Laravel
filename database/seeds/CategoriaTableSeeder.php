<?php
use Illuminate\Database\Seeder;
use app\Categoria;

class CategoriaTableSeeder extends Seeder {

    public function run()
    {
        Categoria::create(['nome' => 'ELETRODOMESTICO']);
        Categoria::create(['nome' => 'ELETRONICA']);
        Categoria::create(['nome' => 'BRINQUEDO']);
        Categoria::create(['nome' => 'ESPORTES']);
    }
}