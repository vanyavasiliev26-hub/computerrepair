

<?php $__env->startSection('title', 'Заявки'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Заявки</h2>
    <div>
        <a href="<?php echo e(route('admin.orders')); ?>?status=new" class="btn btn-outline-warning btn-sm">Новые</a>
        <a href="<?php echo e(route('admin.orders')); ?>?status=in_progress" class="btn btn-outline-info btn-sm">В работе</a>
        <a href="<?php echo e(route('admin.orders')); ?>?status=completed" class="btn btn-outline-success btn-sm">Выполненные</a>
        <a href="<?php echo e(route('admin.orders')); ?>" class="btn btn-outline-secondary btn-sm">Все</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>№ заявки</th>
                        <th>Клиент</th>
                        <th>Услуга</th>
                        <th>Статус</th>
                        <th>Дата</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><strong><?php echo e($order->order_number); ?></strong></td>
                        <td><?php echo e($order->user->name ?? '—'); ?><br><small><?php echo e($order->user->email ?? ''); ?></small></td>
                        <td><?php echo e($order->service->name ?? '—'); ?></td>
                        <td>
                            <span class="badge bg-<?php echo e($order->status == 'new' ? 'warning' : ($order->status == 'in_progress' ? 'info' : ($order->status == 'completed' ? 'success' : 'danger'))); ?>">
                                <?php switch($order->status):
                                    case ('new'): ?> 🕐 Новая <?php break; ?>
                                    <?php case ('in_progress'): ?> ⚙️ В работе <?php break; ?>
                                    <?php case ('completed'): ?> ✅ Выполнена <?php break; ?>
                                    <?php case ('cancelled'): ?> ❌ Отменена <?php break; ?>
                                <?php endswitch; ?>
                            </span>
                        </td>
                        <td><?php echo e($order->created_at->format('d.m.Y H:i')); ?></td>
                        <td>
                            <a href="<?php echo e(route('admin.orders.show', $order->id)); ?>" class="btn btn-sm btn-primary">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <?php echo e($orders->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>