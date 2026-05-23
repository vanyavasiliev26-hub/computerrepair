

<?php $__env->startSection('title', 'Заявка ' . $order->order_number); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Заявка #<?php echo e($order->order_number); ?></h2>
    <a href="<?php echo e(route('admin.orders')); ?>" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Назад
    </a>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Информация о заявке</div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th style="width: 150px">Номер:</th>
                        <td><?php echo e($order->order_number); ?></td>
                    </tr>
                    <tr>
                        <th>Статус:</th>
                        <td>
                            <form method="POST" action="<?php echo e(route('admin.orders.status', $order->id)); ?>" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <select name="status" class="form-select form-select-sm d-inline-block" style="width: auto" onchange="this.form.submit()">
                                    <option value="new" <?php echo e($order->status == 'new' ? 'selected' : ''); ?>>🕐 Новая</option>
                                    <option value="in_progress" <?php echo e($order->status == 'in_progress' ? 'selected' : ''); ?>>⚙️ В работе</option>
                                    <option value="completed" <?php echo e($order->status == 'completed' ? 'selected' : ''); ?>>✅ Выполнена</option>
                                    <option value="cancelled" <?php echo e($order->status == 'cancelled' ? 'selected' : ''); ?>>❌ Отменена</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <th>Услуга:</th>
                        <td><?php echo e($order->service->name ?? '—'); ?></td>
                    </tr>
                    <tr>
                        <th>Описание:</th>
                        <td><?php echo e($order->description); ?></td>
                    </tr>
                    <?php if($order->preferred_date): ?>
                    <tr>
                        <th>Предпочтительная дата:</th>
                        <td><?php echo e($order->preferred_date->format('d.m.Y')); ?></td>
                    </tr>
                    <?php endif; ?>
                    <tr>
                        <th>Дата создания:</th>
                        <td><?php echo e($order->created_at->format('d.m.Y H:i')); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Клиент</div>
            <div class="card-body">
                <p><strong>Имя:</strong> <?php echo e($order->user->name ?? '—'); ?></p>
                <p><strong>Email:</strong> <?php echo e($order->user->email ?? '—'); ?></p>
                <p><strong>Телефон:</strong> <?php echo e($order->user->phone ?? '—'); ?></p>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\resources\views/admin/orders/show.blade.php ENDPATH**/ ?>