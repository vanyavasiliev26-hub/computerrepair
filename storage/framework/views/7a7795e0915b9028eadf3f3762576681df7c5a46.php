

<?php $__env->startSection('title', 'Акции'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Акции</h2>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPromotionModal">
        <i class="fas fa-plus"></i> Добавить акцию
    </button>
</div>

<div class="row">
    <?php $__currentLoopData = $promotions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promotion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <span class="badge bg-danger">Акция</span>
                    <span class="badge bg-<?php echo e($promotion->is_active ? 'success' : 'secondary'); ?>">
                        <?php echo e($promotion->is_active ? 'Активна' : 'Неактивна'); ?>

                    </span>
                </div>
                <div class="text-center mt-3">
                    <?php if($promotion->image && file_exists(public_path($promotion->image))): ?>
                        <img src="<?php echo e(asset($promotion->image)); ?>" style="max-width: 100%; height: 150px; object-fit: cover; border-radius: 8px;">
                    <?php else: ?>
                        <i class="fas fa-tags fa-3x text-primary"></i>
                    <?php endif; ?>
                    <h5 class="mt-3"><?php echo e($promotion->title); ?></h5>
                    <p class="text-muted"><?php echo e(Str::limit($promotion->description, 80)); ?></p>
                </div>
            </div>
            <div class="card-footer bg-white">
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editPromotionModal<?php echo e($promotion->id); ?>">
                    <i class="fas fa-edit"></i> Ред.
                </button>
                <form action="<?php echo e(route('admin.promotions.delete', $promotion->id)); ?>" method="POST" class="d-inline">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Удалить акцию?')">
                        <i class="fas fa-trash"></i> Удалить
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal редактирования -->
    <div class="modal fade" id="editPromotionModal<?php echo e($promotion->id); ?>" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="<?php echo e(route('admin.promotions.update', $promotion->id)); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="modal-header">
                        <h5 class="modal-title">Редактировать акцию</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Название</label>
                            <input type="text" name="title" class="form-control" value="<?php echo e($promotion->title); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label>Описание</label>
                            <textarea name="description" class="form-control" rows="3" required><?php echo e($promotion->description); ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Изображение</label>
                            <?php if($promotion->image && file_exists(public_path($promotion->image))): ?>
                                <div class="mb-2">
                                    <img src="<?php echo e(asset($promotion->image)); ?>" style="max-width: 100%; height: 100px; object-fit: cover;">
                                </div>
                            <?php endif; ?>
                            <input type="file" name="image" class="form-control" accept="image/*">
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="is_active" class="form-check-input" value="1" <?php echo e($promotion->is_active ? 'checked' : ''); ?>>
                            <label class="form-check-label">Активна</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<!-- Modal добавления -->
<div class="modal fade" id="addPromotionModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="<?php echo e(route('admin.promotions.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h5 class="modal-title">Добавить акцию</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Название</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Описание</label>
                        <textarea name="description" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Изображение</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="is_active" class="form-check-input" value="1" checked>
                        <label class="form-check-label">Активна</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\resources\views/admin/promotions/index.blade.php ENDPATH**/ ?>