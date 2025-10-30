

<?php $__env->startSection('conteudo'); ?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h3">Categorias</h1>
  <a class="btn btn-primary" href="<?php echo e(route('categorias.create')); ?>">Nova Categoria</a>
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
    <?php $__empty_1 = true; $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <tr>
        <td><?php echo e($c->id); ?></td>
        <td><?php echo e($c->nome); ?></td>
        <td class="text-end">
          <a class="btn btn-sm btn-warning" href="<?php echo e(route('categorias.edit', $c)); ?>">Editar</a>
          <form action="<?php echo e(route('categorias.destroy', $c)); ?>" method="POST" class="d-inline"
                onsubmit="return confirm('Excluir esta categoria? Tarefas ligadas a ela também serão removidas.');">
            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
            <button class="btn btn-sm btn-danger">Excluir</button>
          </form>
        </td>
      </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <tr><td colspan="3" class="text-center">Nenhuma categoria</td></tr>
    <?php endif; ?>
  </tbody>
</table>

<?php echo e($categorias->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\UniALFA\Documents\tarefas\resources\views/categorias/index.blade.php ENDPATH**/ ?>