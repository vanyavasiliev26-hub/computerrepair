

<?php $__env->startSection('title', 'Личный кабинет'); ?>

<?php $__env->startSection('content'); ?>
<div class="profile-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Карточка профиля -->
                <div class="profile-card">
                    <div class="profile-header">
                        <div class="profile-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <h2><?php echo e($user->name); ?></h2>
                        <p><?php echo e($user->email); ?></p>
                    </div>
                    
                    <?php if(session('success')): ?>
                        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                    <?php endif; ?>
                    
                    <?php if(session('error')): ?>
                        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
                    <?php endif; ?>
                    
                    <div class="profile-info">
                        <div class="info-row">
                            <span class="info-label">Имя:</span>
                            <span class="info-value"><?php echo e($user->name); ?></span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Email:</span>
                            <span class="info-value"><?php echo e($user->email); ?></span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Телефон:</span>
                            <span class="info-value"><?php echo e($user->phone ?? 'Не указан'); ?></span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Дата регистрации:</span>
                            <span class="info-value"><?php echo e($user->created_at->format('d.m.Y')); ?></span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Статус:</span>
                            <span class="info-value">
                                <span class="status-badge">Активен</span>
                            </span>
                        </div>
                    </div>
                    
                    <div class="profile-footer">
                        <form method="POST" action="<?php echo e(route('logout')); ?>" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn-logout">
                                <i class="fas fa-sign-out-alt"></i> Выйти
                            </button>
                        </form>
                    </div>
                </div>
                
                <!-- Заявки пользователя -->
                <div class="orders-card mt-4">
                    <div class="orders-header">
                        <i class="fas fa-clipboard-list"></i>
                        <h3>Мои заявки</h3>
                    </div>
                    <div class="orders-body">
                        <?php if($orders->count() > 0): ?>
                            <div class="table-responsive">
                                <table class="orders-table">
                                    <thead>
                                        <tr>
                                            <th>№ заявки</th>
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
                                            <td><?php echo e($order->service->name ?? '—'); ?></td>
                                            <td>
                                                <?php switch($order->status):
                                                    case ('new'): ?>
                                                        <span class="status-badge status-new">Новая</span>
                                                        <?php break; ?>
                                                    <?php case ('in_progress'): ?>
                                                        <span class="status-badge status-progress">В работе</span>
                                                        <?php break; ?>
                                                    <?php case ('completed'): ?>
                                                        <span class="status-badge status-completed">Выполнена</span>
                                                        <?php break; ?>
                                                    <?php case ('cancelled'): ?>
                                                        <span class="status-badge status-cancelled">Отменена</span>
                                                        <?php break; ?>
                                                <?php endswitch; ?>
                                            </td>
                                            <td><?php echo e($order->created_at->format('d.m.Y')); ?></td>
                                            <td class="actions">
                                                <a href="<?php echo e(route('order.show', $order->id)); ?>" class="btn-icon" title="Просмотр">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <?php if($order->status == 'new'): ?>
                                                    <form method="POST" action="<?php echo e(route('order.cancel', $order->id)); ?>" class="d-inline">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" class="btn-icon btn-cancel" onclick="return confirm('Отменить заявку?')" title="Отменить">
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
                        <?php else: ?>
                            <div class="empty-orders">
                                <i class="fas fa-inbox"></i>
                                <p>У вас пока нет заявок</p>
                                <a href="<?php echo e(route('order')); ?>" class="btn-order">Создать заявку</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .profile-page {
        padding: 60px 0;
        background: #f5f5f5;
        min-height: calc(100vh - 300px);
    }
    
    /* Карточка профиля */
    .profile-card {
        background: white;
        border: 1px solid #e0e0e0;
        padding: 35px;
    }
    
    .profile-header {
        text-align: center;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid #e0e0e0;
    }
    
    .profile-icon {
        width: 70px;
        height: 70px;
        background: #000000;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
    }
    
    .profile-icon i {
        font-size: 32px;
        color: white;
    }
    
    .profile-header h2 {
        font-size: 24px;
        font-weight: 600;
        color: #000000;
        margin-bottom: 5px;
    }
    
    .profile-header p {
        color: #666;
        font-size: 14px;
    }
    
    /* Информация о пользователе */
    .profile-info {
        margin-bottom: 30px;
    }
    
    .info-row {
        display: flex;
        padding: 10px 0;
        border-bottom: 1px solid #f0f0f0;
    }
    
    .info-label {
        width: 150px;
        font-weight: 600;
        color: #333;
    }
    
    .info-value {
        flex: 1;
        color: #666;
    }
    
    /* Кнопка выхода */
    .profile-footer {
        text-align: center;
        padding-top: 20px;
        border-top: 1px solid #e0e0e0;
    }
    
    .btn-logout {
        background: transparent;
        border: 1px solid #dc3545;
        color: #dc3545;
        padding: 8px 25px;
        font-size: 14px;
        transition: all 0.3s;
        cursor: pointer;
    }
    
    .btn-logout:hover {
        background: #dc3545;
        color: white;
    }
    
    /* Alert сообщения */
    .alert-success {
        background: #d4edda;
        border: 1px solid #c3e6cb;
        color: #155724;
        padding: 12px 15px;
        margin-bottom: 25px;
    }
    
    .alert-danger {
        background: #f8d7da;
        border: 1px solid #f5c6cb;
        color: #721c24;
        padding: 12px 15px;
        margin-bottom: 25px;
    }
    
    /* Статус бейдж */
    .status-badge {
        display: inline-block;
        padding: 4px 12px;
        font-size: 12px;
        font-weight: 500;
        background: #e0e0e0;
        color: #333;
    }
    
    .status-new {
        background: #fff3cd;
        color: #856404;
    }
    
    .status-progress {
        background: #cce5ff;
        color: #004085;
    }
    
    .status-completed {
        background: #d4edda;
        color: #155724;
    }
    
    .status-cancelled {
        background: #f8d7da;
        color: #721c24;
    }
    
    /* Карточка заявок */
    .orders-card {
        background: white;
        border: 1px solid #e0e0e0;
    }
    
    .orders-header {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 18px 25px;
        border-bottom: 1px solid #e0e0e0;
    }
    
    .orders-header i {
        font-size: 20px;
        color: #000000;
    }
    
    .orders-header h3 {
        font-size: 18px;
        font-weight: 600;
        color: #000000;
        margin: 0;
    }
    
    .orders-body {
        padding: 25px;
    }
    
    /* Таблица заявок */
    .orders-table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .orders-table th {
        text-align: left;
        padding: 12px 10px;
        background: #f8f9fa;
        font-weight: 600;
        color: #333;
        border-bottom: 1px solid #e0e0e0;
    }
    
    .orders-table td {
        padding: 12px 10px;
        color: #666;
        border-bottom: 1px solid #f0f0f0;
    }
    
    .orders-table tr:hover td {
        background: #f8f9fa;
    }
    
    .actions {
        white-space: nowrap;
    }
    
    .btn-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        background: transparent;
        border: 1px solid #ddd;
        color: #333;
        cursor: pointer;
        transition: all 0.3s;
        margin-right: 5px;
        text-decoration: none;
    }
    
    .btn-icon:hover {
        background: #000000;
        border-color: #000000;
        color: white;
    }
    
    .btn-cancel:hover {
        background: #dc3545;
        border-color: #dc3545;
        color: white;
    }
    
    /* Пустое состояние */
    .empty-orders {
        text-align: center;
        padding: 40px 20px;
    }
    
    .empty-orders i {
        font-size: 48px;
        color: #ccc;
        margin-bottom: 15px;
    }
    
    .empty-orders p {
        color: #999;
        margin-bottom: 20px;
    }
    
    .btn-order {
        display: inline-block;
        background: #000000;
        border: 1px solid #000000;
        color: white;
        padding: 10px 24px;
        font-size: 14px;
        text-decoration: none;
        transition: all 0.3s;
    }
    
    .btn-order:hover {
        background: #333333;
        border-color: #333333;
        color: white;
        text-decoration: none;
    }
    
    @media (max-width: 576px) {
        .profile-card {
            padding: 25px;
        }
        
        .profile-header h2 {
            font-size: 22px;
        }
        
        .profile-icon {
            width: 55px;
            height: 55px;
        }
        
        .profile-icon i {
            font-size: 26px;
        }
        
        .info-row {
            flex-direction: column;
        }
        
        .info-label {
            width: auto;
            margin-bottom: 5px;
        }
        
        .orders-header {
            padding: 15px 20px;
        }
        
        .orders-body {
            padding: 15px;
            overflow-x: auto;
        }
        
        .orders-table {
            min-width: 500px;
        }
    }
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\resources\views/auth/profile.blade.php ENDPATH**/ ?>