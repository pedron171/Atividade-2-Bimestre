@extends('layouts.app')

@section('conteudo')
<h1 class="h3 mb-3">Editar Tarefa</h1>
<form action="{{ route('tarefas.update', $tarefa) }}" method="POST" class="bg-white p-3 rounded">
  @csrf @method('PUT')
  <div class="mb-3">
    <label class="form-label">Categoria</label>
    <select name="categoria_id" class="form-select" required>
      @foreach ($categorias as $c)
        <option value="{{ $c->id }}" @selected(old('categoria_id', $tarefa->categoria_id)==$c->id)>{{ $c->nome }}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label class="form-label">Título</label>
    <input type="text" name="titulo" class="form-control" value="{{ old('titulo', $tarefa->titulo) }}" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Descrição</label>
    <textarea name="descricao" class="form-control" rows="4">{{ old('descricao', $tarefa->descricao) }}</textarea>
  </div>
  <div class="form-check mb-3">
    <input class="form-check-input" type="checkbox" name="concluida" id="concluida" value="1" @checked(old('concluida', $tarefa->concluida))>
    <label class="form-check-label" for="concluida">Concluída</label>
  </div>
  <button class="btn btn-primary">Atualizar</button>
  <a class="btn btn-secondary" href="{{ route('tarefas.index') }}">Voltar</a>
</form>
@endsection
