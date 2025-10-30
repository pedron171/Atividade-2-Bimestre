@extends('layouts.app')
@section('title','Nova Tarefa')

@section('conteudo')
<h1 class="h4 mb-3">Nova Tarefa</h1>
<form action="{{ route('tarefas.store') }}" method="POST" class="card-min p-3">
  @csrf
  <div class="mb-3">
    <label class="form-label">Categoria</label>
    <select name="categoria_id" class="form-select" required>
      <option value="">— Selecione —</option>
      @foreach ($categorias as $c)
        <option value="{{ $c->id }}" @selected(old('categoria_id')==$c->id)>{{ $c->nome }}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label class="form-label">Título</label>
    <input type="text" name="titulo" class="form-control" value="{{ old('titulo') }}" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Descrição</label>
    <textarea name="descricao" class="form-control" rows="4">{{ old('descricao') }}</textarea>
  </div>
  <div class="form-check mb-3">
    <input class="form-check-input" type="checkbox" name="concluida" id="concluida" value="1" @checked(old('concluida'))>
    <label class="form-check-label" for="concluida">Concluída</label>
  </div>
  <button class="btn btn-primary">Salvar</button>
  <a class="btn btn-outline-secondary" href="{{ route('tarefas.index') }}">Voltar</a>
</form>
@endsection
