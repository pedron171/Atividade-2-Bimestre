<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['Trabalho', 'Estudo', 'Pessoal'] as $nome) {
            Categoria::firstOrCreate(['nome' => $nome]);
        }
    }
}
