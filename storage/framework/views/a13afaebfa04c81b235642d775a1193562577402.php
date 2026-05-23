

<?php $__env->startSection('title', 'Мои заявки'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Мои заявки</h4>
            <a href="<?php echo e(route('order.create')); ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Новая заявка
            </a>
        </div>
        <div class="card-body">
            <?php if(session('success')): ?>
                <div class="alert alert-success"><?php echo e(session('success')); ?></div>
            <?php endif; ?>
            
            <?php if($orders->isEmpty()): ?>
                <div class="text-center py-5">
                    <i class="fas fa-clipboard-list fa-3x text-muted mb-3"></i>
                    <h5>У вас пока нет заявок</h5>
                    <p>Создайте новую заявку, и мы свяжемся с вами</p>
                    <a href="<?php echo e(route('order.create')); ?>" class="btn btn-primary">Создать заявку</a>
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>№ заявки</th>
                                <th>Услуга</th>
                                <th>Описание</th>
                                <th>Статус</th>
                                <th>Дата создания</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><strong><?php echo e($order->order_number); ?></strong></td>
                                <td><?php echo e($order->service->name ?? '—'); ?></td>
                                <td><?php echo e(Str::limit($order->description, 50)); ?></td>
                                <td>
                                    <?php switch($order->status):
                                        case ('new'): ?>
                                            <span class="badge bg-warning text-dark">🕐 Новая</span>
                                            <?php break; ?>
                                        <?php case ('in_progress'): ?>
                                            <span class="badge bg-info">⚙️ В работе</span>
                                            <?php break; ?>
                                        <?php case ('completed'): ?>
                                            <span class="badge bg-success">✅ Выполнена</span>
                                            <?php break; ?>
                                        <?php case ('cancelled'): ?>
                                            <span class="badge bg-danger">❌ Отменена</span>
                                            <?php break; ?>
                                    <?php endswitch; ?>
                                </td>
                                <td><?php echo e($order->created_at->format('d.m.Y H:i')); ?></td>
                                <td>
                                    <a href="<?php echo e(route('order.show', $order->id)); ?>" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <?php if($order->status == 'new'): ?>
                                        <form action="<?php echo e(route('order.cancel', $order->id)); ?>" method="POST" class="d-inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Отменить заявку?')">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\resources\views/order/index.blade.php ENDPATH**/ ?>