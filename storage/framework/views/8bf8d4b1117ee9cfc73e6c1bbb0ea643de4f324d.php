

<?php $__env->startSection('title', 'Отзывы'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <strong>Отзывы</strong>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Пользователь</th>
                        <th>Оценка</th>
                        <th>Отзыв</th>
                        <th>Статус</th>
                        <th>Дата</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($review->id); ?></td>
                        <td><?php echo e($review->user->name ?? '—'); ?></td>
                        <td>
                            <div class="text-warning">
                                <?php for($i = 1; $i <= 5; $i++): ?>
                                    <?php if($i <= $review->rating): ?>
                                        <i class="fas fa-star"></i>
                                    <?php else: ?>
                                        <i class="far fa-star"></i>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </div>
                        </td>
                        <td><?php echo e(Str::limit($review->comment, 100)); ?></td>
                        <td>
                            <?php if($review->is_approved): ?>
                                <span class="badge bg-success">Одобрен</span>
                            <?php else: ?>
                                <span class="badge bg-warning">На модерации</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($review->created_at->format('d.m.Y')); ?></td>
                        <td>
                            <?php if(!$review->is_approved): ?>
                                <form action="<?php echo e(route('admin.reviews.approve', $review->id)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <button class="btn btn-sm btn-success" onclick="return confirm('Одобрить отзыв?')">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </form>
                            <?php endif; ?>
                            <form action="<?php echo e(route('admin.reviews.delete', $review->id)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Удалить отзыв?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <?php echo e($reviews->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\resources\views/admin/reviews/index.blade.php ENDPATH**/ ?>