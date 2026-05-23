

<?php $__env->startSection('title', 'Услуги'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Услуги</h2>
    <a href="<?php echo e(route('admin.services.create')); ?>" class="btn btn-primary">
        <i class="fas fa-plus"></i> Добавить услугу
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th style="width: 50px">ID</th>
                        <th style="width: 80px">Изображение</th>
                        <th>Название</th>
                        <th>Цена</th>
                        <th style="width: 120px">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($service->id); ?></td>
                        <td>
                            <?php if($service->image && file_exists(public_path($service->image))): ?>
                                <img src="<?php echo e(asset($service->image)); ?>" alt="<?php echo e($service->name); ?>" style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px;">
                            <?php else: ?>
                                <div style="width: 50px; height: 50px; background: #f0f0f0; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-image text-muted"></i>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td>
                            <strong><?php echo e($service->name); ?></strong><br>
                            <small class="text-muted"><?php echo e(Str::limit($service->description, 60)); ?></small>
                        </td>
                        <td>
                            <?php if($service->price): ?>
                                <?php echo e(number_format($service->price, 2)); ?> ₽
                            <?php else: ?>
                                <span class="text-muted">—</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?php echo e(route('admin.services.edit', $service->id)); ?>" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="<?php echo e(route('admin.services.delete', $service->id)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Удалить услугу?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\resources\views/admin/services/index.blade.php ENDPATH**/ ?>