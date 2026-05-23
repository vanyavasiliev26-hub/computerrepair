

<?php $__env->startSection('title', 'Статьи'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Статьи</h2>
    <a href="<?php echo e(route('admin.articles.create')); ?>" class="btn btn-primary">
        <i class="fas fa-plus"></i> Добавить статью
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Изображение</th>
                        <th>Заголовок</th>
                        <th>Статус</th>
                        <th>Дата</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($article->id); ?></td>
                        <td>
                            <?php if($article->image && file_exists(public_path($article->image))): ?>
                                <img src="<?php echo e(asset($article->image)); ?>" style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px;">
                            <?php else: ?>
                                <div style="width: 50px; height: 50px; background: #f0f0f0; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-newspaper text-muted"></i>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($article->title); ?></td>
                        <td>
                            <span class="badge bg-<?php echo e($article->is_active ? 'success' : 'danger'); ?>">
                                <?php echo e($article->is_active ? 'Активна' : 'Неактивна'); ?>

                            </span>
                        </td>
                        <td><?php echo e($article->published_at ? $article->published_at->format('d.m.Y') : $article->created_at->format('d.m.Y')); ?></td>
                        <td>
                            <a href="<?php echo e(route('admin.articles.edit', $article->id)); ?>" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="<?php echo e(route('admin.articles.delete', $article->id)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Удалить статью?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <?php echo e($articles->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\resources\views/admin/articles/index.blade.php ENDPATH**/ ?>