<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tarefa;
use App\Models\Categoria;

class TarefaSeeder extends Seeder
{
    public function run(): void
    {
        $cat = Categoria::firstOrCreate(['nome' => 'Estudo']);
        Tarefa::firstOrCreate([
            'categoria_id' => $cat->id,
            'titulo'       => 'Revisar conteúdo de Laravel',
        ], [
            'descricao'    => 'Praticar controllers, rotas, migrations e Eloquent.',
            'concluida'    => false,
        ]);
    }
}
