

<?php $__env->startSection('title', 'Заявка ' . $order->order_number); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Заявка <?php echo e($order->order_number); ?></h4>
                    <a href="<?php echo e(route('orders')); ?>" class="btn btn-secondary btn-sm">← Назад к списку</a>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Статус:</div>
                        <div class="col-md-8">
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
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Услуга:</div>
                        <div class="col-md-8"><?php echo e($order->service->name ?? '—'); ?></div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Описание проблемы:</div>
                        <div class="col-md-8"><?php echo e($order->description); ?></div>
                    </div>
                    
                    <?php if($order->preferred_date): ?>
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Предпочтительная дата:</div>
                        <div class="col-md-8"><?php echo e($order->preferred_date->format('d.m.Y')); ?></div>
                    </div>
                    <?php endif; ?>
                    
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Дата создания:</div>
                        <div class="col-md-8"><?php echo e($order->created_at->format('d.m.Y H:i')); ?></div>
                    </div>
                    
                    <?php if($order->admin_comment): ?>
                    <div class="alert alert-info mt-3">
                        <strong>Комментарий администратора:</strong><br>
                        <?php echo e($order->admin_comment); ?>

                    </div>
                    <?php endif; ?>
                    
                    <?php if($order->status == 'new'): ?>
                    <div class="mt-4">
                        <form action="<?php echo e(route('order.cancel', $order->id)); ?>" method="POST" onsubmit="return confirm('Вы уверены, что хотите отменить заявку?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">Отменить заявку</button>
                        </form>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\resources\views/order/show.blade.php ENDPATH**/ ?>