@extends('layouts.app')

@section('conteudo')
<h1 class="h3 mb-3">Editar Categoria</h1>
<form action="{{ route('categorias.update', $categoria) }}" method="POST" class="bg-white p-3 rounded">
  @csrf @method('PUT')
  <div class="mb-3">
    <label class="form-label">Nome</label>
    <input type="text" name="nome" class="form-control" value="{{ old('nome', $categoria->nome) }}" required>
  </div>
  <button class="btn btn-primary">Atualizar</button>
  <a class="btn btn-secondary" href="{{ route('categorias.index') }}">Voltar</a>
</form>
@endsection
