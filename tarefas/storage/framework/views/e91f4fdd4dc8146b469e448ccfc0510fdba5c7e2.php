
<?php $__env->startSection('title','Minhas Tarefas'); ?>

<?php $__env->startSection('conteudo'); ?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h4 mb-0">Minhas Tarefas</h1>
  <a class="btn btn-primary btn-sm" href="<?php echo e(route('tarefas.create')); ?>">+ Nova Tarefa</a>
</div>


<?php
  $perc = $total > 0 ? round(($feitas / max($total,1)) * 100) : 0;
?>

<div class="card-min p-3 mb-3">
  <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
    <div><strong>Total:</strong> <?php echo e($total); ?></div>
    <div><span class="status-dot dot-ok"></span><strong>Concluídas:</strong> <?php echo e($feitas); ?></div>
    <div><span class="status-dot dot-pend"></span><strong>Pendentes:</strong> <?php echo e($pendentes); ?></div>
    <div class="ms-auto"><strong><?php echo e($perc); ?>%</strong> concluído</div>
  </div>
  <div class="progress-wrap mt-2">
    <div class="progress-bar-min" style="width: <?php echo e($perc); ?>%"></div>
  </div>
</div>



<form method="GET" class="row g-2 mb-3">
  <div class="col-auto">
    <select name="categoria_id" class="form-select form-select-sm" onchange="this.form.submit()">
      <option value="">— Filtrar por categoria —</option>
      <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($cat->id); ?>" <?php if($filtroCategoria==$cat->id): echo 'selected'; endif; ?>><?php echo e($cat->nome); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
  </div>
  <?php if($filtroCategoria): ?>
  <div class="col-auto">
    <a href="<?php echo e(route('tarefas.index')); ?>" class="btn btn-outline-secondary btn-sm">Limpar</a>
  </div>
  <?php endif; ?>
</form>


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
        <?php $__empty_1 = true; $__currentLoopData = $tarefas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
  <tr>
    <td>
      <span class="chip-id">#<?php echo e($t->id); ?></span>
    </td>
    <td>
      <div class="fw-semibold"><?php echo e($t->titulo); ?></div>
      <div class="text-muted small">
        criada <?php echo e($t->created_at?->diffForHumans()); ?>

        <?php if($t->updated_at && $t->updated_at->ne($t->created_at)): ?>
          • atualizada <?php echo e($t->updated_at->diffForHumans()); ?>

        <?php endif; ?>
      </div>
    </td>
    <td>
      <?php
        $ini = strtoupper(mb_substr($t->categoria?->nome ?? '—', 0, 1));
      ?>
      <span class="cat-avatar"><?php echo e($ini); ?></span>
      <span><?php echo e($t->categoria?->nome ?? '—'); ?></span>
    </td>
    <td>
      <?php if($t->concluida): ?>
        <span class="status-dot dot-ok"></span> Concluída
      <?php else: ?>
        <span class="status-dot dot-pend"></span> Pendente
      <?php endif; ?>
    </td>
    <td class="text-end">
      <a class="btn btn-sm btn-outline-primary" href="<?php echo e(route('tarefas.edit', $t)); ?>">Editar</a>
      <form action="<?php echo e(route('tarefas.destroy', $t)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Excluir esta tarefa?');">
        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
        <button class="btn btn-sm btn-outline-danger">Excluir</button>
      </form>
    </td>
  </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
  <tr><td colspan="5" class="text-center text-muted">Nenhuma tarefa</td></tr>
<?php endif; ?>

      </tbody>
    </table>
  </div>
</div>

<div class="mt-3">
  <?php echo e($tarefas->links()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\UniALFA\Documents\tarefas\resources\views/tarefas/index.blade.php ENDPATH**/ ?>