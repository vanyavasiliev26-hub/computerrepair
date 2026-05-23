

<?php $__env->startSection('title', 'Редактировать статью'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Редактировать статью</h2>
    <a href="<?php echo e(route('admin.articles')); ?>" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Назад
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="<?php echo e(route('admin.articles.update', $article->id)); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            
            <div class="mb-3">
                <label for="title" class="form-label">Заголовок <span class="text-danger">*</span></label>
                <input type="text" name="title" id="title" class="form-control" value="<?php echo e(old('title', $article->title)); ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="content" class="form-label">Содержание <span class="text-danger">*</span></label>
                <textarea name="content" id="content" rows="10" class="form-control" required><?php echo e(old('content', $article->content)); ?></textarea>
            </div>
            
            <div class="mb-3">
                <label for="image" class="form-label">Изображение</label>
                <?php if($article->image && file_exists(public_path($article->image))): ?>
                    <div class="mb-2">
                        <img src="<?php echo e(asset($article->image)); ?>" style="max-width: 200px; max-height: 150px; border-radius: 8px;" class="border p-1">
                        <br>
                        <small class="text-muted">Текущее изображение</small>
                    </div>
                <?php endif; ?>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                <small class="text-muted">Оставьте пустым, если не хотите менять изображение</small>
            </div>
            
            <div class="form-check mb-3">
                <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1" <?php echo e($article->is_active ? 'checked' : ''); ?>>
                <label class="form-check-label" for="is_active">Активна</label>
            </div>
            
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\resources\views/admin/articles/edit.blade.php ENDPATH**/ ?>