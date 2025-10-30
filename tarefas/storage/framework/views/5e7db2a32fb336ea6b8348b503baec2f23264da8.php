
<?php $__env->startSection('title','Nova Tarefa'); ?>

<?php $__env->startSection('conteudo'); ?>
<h1 class="h4 mb-3">Nova Tarefa</h1>
<form action="<?php echo e(route('tarefas.store')); ?>" method="POST" class="card-min p-3">
  <?php echo csrf_field(); ?>
  <div class="mb-3">
    <label class="form-label">Categoria</label>
    <select name="categoria_id" class="form-select" required>
      <option value="">— Selecione —</option>
      <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($c->id); ?>" <?php if(old('categoria_id')==$c->id): echo 'selected'; endif; ?>><?php echo e($c->nome); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
  </div>
  <div class="mb-3">
    <label class="form-label">Título</label>
    <input type="text" name="titulo" class="form-control" value="<?php echo e(old('titulo')); ?>" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Descrição</label>
    <textarea name="descricao" class="form-control" rows="4"><?php echo e(old('descricao')); ?></textarea>
  </div>
  <div class="form-check mb-3">
    <input class="form-check-input" type="checkbox" name="concluida" id="concluida" value="1" <?php if(old('concluida')): echo 'checked'; endif; ?>>
    <label class="form-check-label" for="concluida">Concluída</label>
  </div>
  <button class="btn btn-primary">Salvar</button>
  <a class="btn btn-outline-secondary" href="<?php echo e(route('tarefas.index')); ?>">Voltar</a>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\UniALFA\Documents\tarefas\resources\views/tarefas/create.blade.php ENDPATH**/ ?>