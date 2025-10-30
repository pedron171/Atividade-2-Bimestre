

<?php $__env->startSection('conteudo'); ?>
<h1 class="h3 mb-3">Editar Categoria</h1>
<form action="<?php echo e(route('categorias.update', $categoria)); ?>" method="POST" class="bg-white p-3 rounded">
  <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
  <div class="mb-3">
    <label class="form-label">Nome</label>
    <input type="text" name="nome" class="form-control" value="<?php echo e(old('nome', $categoria->nome)); ?>" required>
  </div>
  <button class="btn btn-primary">Atualizar</button>
  <a class="btn btn-secondary" href="<?php echo e(route('categorias.index')); ?>">Voltar</a>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\UniALFA\Documents\tarefas\resources\views/categorias/edit.blade.php ENDPATH**/ ?>