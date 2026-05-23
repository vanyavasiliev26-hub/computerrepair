

<?php $__env->startSection('title', 'Оставить заявку - Ремонт компьютеров'); ?>

<?php $__env->startSection('content'); ?>
<div class="order-page">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="order-card">
                <div class="order-header">
                    <i class="fas fa-clipboard-list"></i>
                    <h2>Оставить заявку на ремонт</h2>
                    <p>Заполните форму, и мы свяжемся с вами</p>
                </div>
                
                <form method="POST" action="<?php echo e(route('order.store')); ?>">
                    <?php echo csrf_field(); ?>
                    
                    <div class="mb-4">
                        <label for="service_id" class="form-label">Выберите услугу *</label>
                        <select name="service_id" id="service_id" class="form-select" required>
                            <option value="">-- Выберите услугу --</option>
                            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($service->id); ?>" <?php echo e(request('service') == $service->id ? 'selected' : ''); ?>>
                                <?php echo e($service->name); ?> - <?php echo e(number_format($service->price, 0, '', ' ')); ?> ₽
                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['service_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="error-text"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    
                    <div class="mb-4">
                        <label for="description" class="form-label">Описание проблемы</label>
                        <textarea name="description" id="description" class="form-control" rows="4" 
                                  placeholder="Опишите подробно, что случилось с вашим устройством..."></textarea>
                        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="error-text"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    
                    <div class="mb-4">
                        <label for="preferred_date" class="form-label">Удобная дата</label>
                        <input type="date" name="preferred_date" id="preferred_date" class="form-control">
                        <?php $__errorArgs = ['preferred_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="error-text"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i> После отправки заявки с вами свяжется менеджер для уточнения деталей.
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-lg w-100">
                        <i class="fas fa-paper-plane"></i> Отправить заявку
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .order-page {
        padding: 40px 0;
        min-height: calc(100vh - 300px);
    }
    .order-card {
        background: white;
        border-radius: 20px;
        padding: 35px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    .order-header {
        text-align: center;
        margin-bottom: 30px;
    }
    .order-header i {
        font-size: 60px;
        color: #3498db;
        margin-bottom: 15px;
    }
    .order-header h2 {
        font-size: 28px;
        color: #2c3e50;
        margin-bottom: 8px;
    }
    .order-header p {
        color: #666;
    }
    .form-label {
        font-weight: 500;
        margin-bottom: 8px;
    }
    .form-select, .form-control {
        border-radius: 10px;
        padding: 10px 15px;
        border: 1px solid #ddd;
    }
    .form-select:focus, .form-control:focus {
        border-color: #3498db;
        box-shadow: 0 0 0 3px rgba(52,152,219,0.1);
    }
    .error-text {
        color: #dc3545;
        font-size: 12px;
        margin-top: 5px;
    }
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\resources\views/order.blade.php ENDPATH**/ ?>