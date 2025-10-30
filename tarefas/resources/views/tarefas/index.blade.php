@extends('layouts.app')
@section('title','Minhas Tarefas')

@section('conteudo')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h4 mb-0">Minhas Tarefas</h1>
  <a class="btn btn-primary btn-sm" href="{{ route('tarefas.create') }}">+ Nova Tarefa</a>
</div>

{{-- Resumo + barra de progresso --}}
@php
  $perc = $total > 0 ? round(($feitas / max($total,1)) * 100) : 0;
@endphp

<div class="card-min p-3 mb-3">
  <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
    <div><strong>Total:</strong> {{ $total }}</div>
    <div><span class="status-dot dot-ok"></span><strong>Concluídas:</strong> {{ $feitas }}</div>
    <div><span class="status-dot dot-pend"></span><strong>Pendentes:</strong> {{ $pendentes }}</div>
    <div class="ms-auto"><strong>{{ $perc }}%</strong> concluído</div>
  </div>
  <div class="progress-wrap mt-2">
    <div class="progress-bar-min" style="width: {{ $perc }}%"></div>
  </div>
</div>


{{-- Filtro por categoria --}}
<form method="GET" class="row g-2 mb-3">
  <div class="col-auto">
    <select name="categoria_id" class="form-select form-select-sm" onchange="this.form.submit()">
      <option value="">— Filtrar por categoria —</option>
      @foreach ($categorias as $cat)
        <option value="{{ $cat->id }}" @selected($filtroCategoria==$cat->id)>{{ $cat->nome }}</option>
      @endforeach
    </select>
  </div>
  @if ($filtroCategoria)
  <div class="col-auto">
    <a href="{{ route('tarefas.index') }}" class="btn btn-outline-secondary btn-sm">Limpar</a>
  </div>
  @endif
</form>

{{-- Tabela simples --}}
<div class="card-min p-2">
  <div class="table-responsive">
    <table class="table align-middle mb-0">
      <thead>
        <tr>
          <th style="width:60px">#</th>
          <th>Título</th>
          <th>Categoria</th>
          <th>Status</th>
          <th class="text-end">Ações</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($tarefas as $t)
  <tr>
    <td>
      <span class="chip-id">#{{ $t->id }}</span>
    </td>
    <td>
      <div class="fw-semibold">{{ $t->titulo }}</div>
      <div class="text-muted small">
        criada {{ $t->created_at?->diffForHumans() }}
        @if($t->updated_at && $t->updated_at->ne($t->created_at))
          • atualizada {{ $t->updated_at->diffForHumans() }}
        @endif
      </div>
    </td>
    <td>
      @php
        $ini = strtoupper(mb_substr($t->categoria?->nome ?? '—', 0, 1));
      @endphp
      <span class="cat-avatar">{{ $ini }}</span>
      <span>{{ $t->categoria?->nome ?? '—' }}</span>
    </td>
    <td>
      @if($t->concluida)
        <span class="status-dot dot-ok"></span> Concluída
      @else
        <span class="status-dot dot-pend"></span> Pendente
      @endif
    </td>
    <td class="text-end">
      <a class="btn btn-sm btn-outline-primary" href="{{ route('tarefas.edit', $t) }}">Editar</a>
      <form action="{{ route('tarefas.destroy', $t) }}" method="POST" class="d-inline" onsubmit="return confirm('Excluir esta tarefa?');">
        @csrf @method('DELETE')
        <button class="btn btn-sm btn-outline-danger">Excluir</button>
      </form>
    </td>
  </tr>
@empty
  <tr><td colspan="5" class="text-center text-muted">Nenhuma tarefa</td></tr>
@endforelse

      </tbody>
    </table>
  </div>
</div>

<div class="mt-3">
  {{ $tarefas->links() }}
</div>
@endsection
