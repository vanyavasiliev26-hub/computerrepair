<?php $__env->startSection('title', 'Главная - Ремонт компьютеров'); ?>

<?php $__env->startSection('content'); ?>
<div class="home-page">
    <div class="container">
        <!-- Блок 1: Услуги -->
        <div class="offers-section">
            <h1 class="section-title">Наши услуги</h1>
            <p class="section-subtitle">Профессиональный ремонт компьютеров и ноутбуков с гарантией качества</p>
            
            <div class="services-grid">
                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="service-card">
                    <div class="service-image">
                        <?php if($service->image && file_exists(public_path($service->image))): ?>
                            <img src="<?php echo e(asset($service->image)); ?>" alt="<?php echo e($service->name); ?>">
                        <?php else: ?>
                            <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-tools" style="font-size: 48px; color: white;"></i>
                            </div>
                        <?php endif; ?>
                        <div class="service-price-badge"><?php echo e(number_format($service->price, 0, '', ' ')); ?> ₽</div>
                    </div>
                    <div class="service-content">
                        <div class="service-icon">
                            <i class="fas fa-tools"></i>
                        </div>
                        <h3><?php echo e($service->name); ?></h3>
                        <p><?php echo e(Str::limit($service->description, 100)); ?></p>
                        <a href="<?php echo e(route('order')); ?>" class="btn-detail">Заказать →</a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <!-- Блок 2: Акции -->
        <?php if($promotions->count() > 0): ?>
        <div class="promotions-section mt-5">
            <h2 class="section-title">Наши акции</h2>
            <p class="section-subtitle">Специальные предложения для наших клиентов</p>
            
            <div class="services-grid">
                <?php $__currentLoopData = $promotions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="promo-card">
                    <div class="promo-image">
                        <?php if($promo->image && file_exists(public_path($promo->image))): ?>
                            <img src="<?php echo e(asset($promo->image)); ?>" alt="<?php echo e($promo->title); ?>">
                        <?php else: ?>
                            <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-tags" style="font-size: 48px; color: white;"></i>
                            </div>
                        <?php endif; ?>
                        <div class="promo-badge">Акция</div>
                    </div>
                    <div class="promo-content">
                        <div class="promo-icon">
                            <i class="fas fa-tags"></i>
                        </div>
                        <h3><?php echo e($promo->title); ?></h3>
                        <p><?php echo e(Str::limit($promo->description, 100)); ?></p>
                        <a href="<?php echo e(route('order')); ?>" class="btn-detail">Записаться →</a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endif; ?>

        <!-- Блок 3: Новости -->
        <?php if($news->count() > 0): ?>
        <div class="news-section mt-5">
            <h2 class="section-title">Новости компании</h2>
            <p class="section-subtitle">Будьте в курсе последних событий</p>
            
            <div class="news-grid">
                <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="news-card">
                    <div class="news-date">
                        <i class="far fa-calendar-alt"></i> <?php echo e($item->published_at ? $item->published_at->format('d.m.Y') : $item->created_at->format('d.m.Y')); ?>

                    </div>
                    <h3><?php echo e($item->title); ?></h3>
                    <p><?php echo e(Str::limit($item->content, 120)); ?></p>
                    <a href="#" class="btn-detail">Читать далее →</a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .home-page {
        padding: 40px 0;
        background: #f8f9fa;
        min-height: calc(100vh - 300px);
    }
    
    .section-title {
        text-align: center;
        font-size: 36px;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 15px;
    }
    
    .section-subtitle {
        text-align: center;
        color: #666;
        margin-bottom: 50px;
        font-size: 16px;
    }
    
    /* Сетка услуг и акций */
    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 30px;
    }
    
    /* Карточка услуги */
    .service-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    }
    
    .service-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    }
    
    .service-image {
        position: relative;
        height: 220px;
        overflow: hidden;
    }
    
    .service-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .service-card:hover .service-image img {
        transform: scale(1.05);
    }
    
    .service-price-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 8px 16px;
        border-radius: 30px;
        font-weight: bold;
        font-size: 16px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.2);
    }
    
    .service-content {
        padding: 25px;
        text-align: center;
    }
    
    .service-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: -45px auto 15px;
        position: relative;
        box-shadow: 0 5px 15px rgba(102,126,234,0.3);
    }
    
    .service-icon i {
        font-size: 28px;
        color: white;
    }
    
    .service-content h3 {
        font-size: 20px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 12px;
    }
    
    .service-content p {
        color: #666;
        line-height: 1.6;
        margin-bottom: 20px;
    }
    
    .btn-detail {
        display: inline-block;
        color: #667eea;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s;
    }
    
    .btn-detail:hover {
        color: #764ba2;
        transform: translateX(5px);
    }
    
    /* Карточка акции */
    .promo-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    }
    
    .promo-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    }
    
    .promo-image {
        position: relative;
        height: 220px;
        overflow: hidden;
    }
    
    .promo-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .promo-card:hover .promo-image img {
        transform: scale(1.05);
    }
    
    .promo-badge {
        position: absolute;
        top: 15px;
        left: 15px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 8px 16px;
        border-radius: 30px;
        font-weight: bold;
        font-size: 16px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.2);
    }
    
    .promo-content {
        padding: 25px;
        text-align: center;
    }
    
    .promo-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: -45px auto 15px;
        position: relative;
        box-shadow: 0 5px 15px rgba(102,126,234,0.3);
    }
    
    .promo-icon i {
        font-size: 28px;
        color: white;
    }
    
    .promo-content h3 {
        font-size: 20px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 12px;
    }
    
    .promo-content p {
        color: #666;
        line-height: 1.6;
        margin-bottom: 20px;
    }
    
    /* Сетка новостей */
    .news-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 30px;
    }
    
    /* Карточка новости */
    .news-card {
        background: white;
        border-radius: 20px;
        padding: 25px;
        transition: all 0.3s ease;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    }
    
    .news-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    }
    
    .news-date {
        color: #667eea;
        font-size: 14px;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .news-card h3 {
        font-size: 18px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 12px;
    }
    
    .news-card p {
        color: #666;
        line-height: 1.6;
        margin-bottom: 20px;
    }
    
    /* Адаптивность */
    @media (max-width: 768px) {
        .home-page {
            padding: 30px 0;
        }
        
        .section-title {
            font-size: 28px;
        }
        
        .section-subtitle {
            font-size: 14px;
            margin-bottom: 30px;
        }
        
        .services-grid,
        .news-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        
        .service-image,
        .promo-image {
            height: 180px;
        }
    }
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\resources\views/welcome.blade.php ENDPATH**/ ?>