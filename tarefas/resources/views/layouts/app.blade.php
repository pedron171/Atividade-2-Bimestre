<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Tarefas')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    
    body{ background:#f7f8fb; }
    .topbar{ background:#0d6efd; }
    .card-min{ background:#fff; border:1px solid #e9ecef; border-radius:10px; }
    .status-dot{ width:.6rem; height:.6rem; border-radius:50%; display:inline-block; margin-right:.4rem; }
    .dot-ok{ background:#22c55e; }    
    .dot-pend{ background:#6c757d; }  

  
    :root{
    --brand:#0b63ce;           
    --brand-weak:#e7f0ff;      
    --ink:#2b2f36;
    --line:#e9ecef;
    --ok:#22c55e;
    --muted:#6c757d;
    --radius:10px;
  }
  .topbar{ background:var(--brand) !important; }
  .card-min{ background:#fff; border:1px solid var(--line); border-radius:var(--radius); }
  .chip-id{ font: 600 12px/1 ui-monospace, SFMono-Regular, Menlo, Consolas, monospace; 
            background: var(--brand-weak); color: var(--brand); border:1px solid #cfe2ff;
            padding:.2rem .45rem; border-radius: 999px; }
  .cat-avatar{ width:28px; height:28px; border-radius:50%; background:var(--brand-weak); 
               color:var(--brand); display:inline-flex; align-items:center; justify-content:center; 
               font-weight:700; margin-right:.5rem; }
  .status-dot{ width:.55rem; height:.55rem; border-radius:50%; display:inline-block; margin-right:.35rem; }
  .dot-ok{ background:var(--ok); } 
  .dot-pend{ background:var(--muted); }
  .progress-wrap{ background:#f1f3f5; border-radius:999px; overflow:hidden; height:8px; }
  .progress-bar-min{ background:var(--brand); height:100%; }

  </style>
</head>
<body>
<nav class="navbar navbar-dark topbar mb-4">
  <div class="container">
    <a class="navbar-brand" href="{{ route('tarefas.index') }}">Tarefas</a>
    <div class="d-flex gap-2">
      <a class="btn btn-light btn-sm" href="{{ route('tarefas.index') }}">Lista</a>
      <a class="btn btn-light btn-sm" href="{{ route('categorias.index') }}">Categorias</a>
    </div>
  </div>
</nav>

<div class="container mb-4">
  @if(session('sucesso'))
    <div class="alert alert-success">{{ session('sucesso') }}</div>
  @endif
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
  @endif

  @yield('conteudo')
</div>

<footer class="text-center text-white py-3 mt-auto" style="background-color:var(--brand);">
  <small>Site desenvolvido por <strong>Pedro Figueiredo</strong> e <strong>Vinicius Pedron</strong>.</small>
</footer>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
