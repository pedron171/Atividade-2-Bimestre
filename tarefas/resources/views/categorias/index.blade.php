@extends('layouts.app')

@section('conteudo')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h3">Categorias</h1>
  <a class="btn btn-primary" href="{{ route('categorias.create') }}">Nova Categoria</a>
</div>

<table class="table table-striped bg-white">
  <thead>
    <tr>
      <th>#</th>
      <th>Nome</th>
      <th class="text-end">Ações</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($categorias as $c)
      <tr>
        <td>{{ $c->id }}</td>
        <td>{{ $c->nome }}</td>
        <td class="text-end">
          <a class="btn btn-sm btn-warning" href="{{ route('categorias.edit', $c) }}">Editar</a>
          <form action="{{ route('categorias.destroy', $c) }}" method="POST" class="d-inline"
                onsubmit="return confirm('Excluir esta categoria? Tarefas ligadas a ela também serão removidas.');">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger">Excluir</button>
          </form>
        </td>
      </tr>
    @empty
      <tr><td colspan="3" class="text-center">Nenhuma categoria</td></tr>
    @endforelse
  </tbody>
</table>

{{ $categorias->links() }}
@endsection
