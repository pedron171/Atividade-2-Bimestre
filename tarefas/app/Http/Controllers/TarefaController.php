<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use App\Models\Categoria;
use Illuminate\Http\Request;

class TarefaController extends Controller
{

    public function index(Request $request)
{
    $filtroCategoria = $request->get('categoria_id');
    $query = Tarefa::with('categoria')->orderByDesc('created_at');

    if ($filtroCategoria) {
        $query->where('categoria_id', $filtroCategoria);
    }

    $tarefas = $query->paginate(10);
    $categorias = Categoria::orderBy('nome')->get();

    
    $total = Tarefa::count();
    $feitas = Tarefa::where('concluida', true)->count();
    $pendentes = $total - $feitas;

    
    return view('tarefas.index', compact(
        'tarefas',
        'categorias',
        'filtroCategoria',
        'total',
        'feitas',
        'pendentes'
    ));
}


    public function create()
    {
        $categorias = Categoria::orderBy('nome')->get();
        return view('tarefas.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'titulo'       => 'required|string|max:255',
            'descricao'    => 'nullable|string',
            'concluida'    => 'nullable|boolean',
        ], [
            'categoria_id.required' => 'Selecione uma categoria.',
            'titulo.required'       => 'O título é obrigatório.',
        ]);

        $dados['concluida'] = (bool) $request->has('concluida');

        Tarefa::create($dados);
        return redirect()->route('tarefas.index')->with('sucesso', 'Tarefa criada com sucesso!');
    }

    public function edit(Tarefa $tarefa)
    {
        $categorias = Categoria::orderBy('nome')->get();
        return view('tarefas.edit', compact('tarefa', 'categorias'));
    }

    public function update(Request $request, Tarefa $tarefa)
    {
        $dados = $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'titulo'       => 'required|string|max:255',
            'descricao'    => 'nullable|string',
            'concluida'    => 'nullable|boolean',
        ]);

        $dados['concluida'] = (bool) $request->has('concluida');

        $tarefa->update($dados);
        return redirect()->route('tarefas.index')->with('sucesso', 'Tarefa atualizada!');
    }

    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();
        return redirect()->route('tarefas.index')->with('sucesso', 'Tarefa excluída!');
    }
}
