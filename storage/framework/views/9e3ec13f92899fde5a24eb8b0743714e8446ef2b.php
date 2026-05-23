

<?php $__env->startSection('title', 'Услуги - Ремонт компьютеров'); ?>

<?php $__env->startSection('content'); ?>
<div class="services-page">
    <h1 class="mb-4">Наши услуги</h1>
    
    <div class="row">
        <!-- Услуга 1 -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-desktop"></i>
                </div>
                <h3>Ремонт компьютеров</h3>
                <p>Диагностика и ремонт системных блоков любой сложности. Замена материнской платы, блока питания, оперативной памяти.</p>
                <ul class="service-list">
                    <li>Диагностика — <strong>бесплатно</strong></li>
                    <li>Ремонт ПК — <strong>от 500 ₽</strong></li>
                    <li>Замена блока питания — <strong>от 800 ₽</strong></li>
                </ul>
                <a href="<?php echo e(route('order')); ?>" class="btn btn-primary w-100">Заказать</a>
            </div>
        </div>
        
        <!-- Услуга 2 -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-laptop"></i>
                </div>
                <h3>Ремонт ноутбуков</h3>
                <p>Замена матрицы, клавиатуры, чистка от пыли, замена термопасты. Ремонт любой сложности.</p>
                <ul class="service-list">
                    <li>Чистка от пыли — <strong>от 1000 ₽</strong></li>
                    <li>Замена матрицы — <strong>от 3000 ₽</strong></li>
                    <li>Замена клавиатуры — <strong>от 1500 ₽</strong></li>
                </ul>
                <a href="<?php echo e(route('order')); ?>" class="btn btn-primary w-100">Заказать</a>
            </div>
        </div>
        
        <!-- Услуга 3 -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-microchip"></i>
                </div>
                <h3>Замена комплектующих</h3>
                <p>Установка и замена процессора, видеокарты, SSD, HDD, оперативной памяти, кулера.</p>
                <ul class="service-list">
                    <li>Установка SSD — <strong>от 600 ₽</strong></li>
                    <li>Замена процессора — <strong>от 1000 ₽</strong></li>
                    <li>Замена видеокарты — <strong>от 800 ₽</strong></li>
                </ul>
                <a href="<?php echo e(route('order')); ?>" class="btn btn-primary w-100">Заказать</a>
            </div>
        </div>
        
        <!-- Услуга 4 -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-window-restore"></i>
                </div>
                <h3>Установка ПО</h3>
                <p>Установка и настройка операционных систем, драйверов, антивирусов, офисных программ.</p>
                <ul class="service-list">
                    <li>Установка Windows — <strong>от 500 ₽</strong></li>
                    <li>Установка драйверов — <strong>от 300 ₽</strong></li>
                    <li>Антивирусная обработка — <strong>от 400 ₽</strong></li>
                </ul>
                <a href="<?php echo e(route('order')); ?>" class="btn btn-primary w-100">Заказать</a>
            </div>
        </div>
        
        <!-- Услуга 5 -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-database"></i>
                </div>
                <h3>Восстановление данных</h3>
                <p>Восстановление удаленных файлов и данных с жестких дисков, SSD, флешек.</p>
                <ul class="service-list">
                    <li>Диагностика накопителя — <strong>бесплатно</strong></li>
                    <li>Восстановление данных — <strong>от 1000 ₽</strong></li>
                </ul>
                <a href="<?php echo e(route('order')); ?>" class="btn btn-primary w-100">Заказать</a>
            </div>
        </div>
        
        <!-- Услуга 6 -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Настройка безопасности</h3>
                <p>Настройка брандмауэра, установка антивирусов, конфигурация безопасного доступа.</p>
                <ul class="service-list">
                    <li>Установка антивируса — <strong>от 400 ₽</strong></li>
                    <li>Настройка безопасности — <strong>от 600 ₽</strong></li>
                </ul>
                <a href="<?php echo e(route('order')); ?>" class="btn btn-primary w-100">Заказать</a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .service-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        transition: transform 0.3s;
        height: 100%;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    .service-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    .service-icon {
        font-size: 48px;
        color: #3498db;
        margin-bottom: 15px;
    }
    .service-card h3 {
        font-size: 20px;
        margin-bottom: 15px;
    }
    .service-list {
        padding-left: 0;
        list-style: none;
        margin: 15px 0;
    }
    .service-list li {
        padding: 5px 0;
        border-bottom: 1px solid #eee;
    }
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH B:\ospanel\OSPanel\domains\localhost\resources\views/services.blade.php ENDPATH**/ ?>