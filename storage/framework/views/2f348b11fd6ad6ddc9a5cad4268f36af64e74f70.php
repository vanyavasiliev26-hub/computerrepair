<?php $__env->startSection('title', 'Главная - Ремонт компьютеров'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Блок 1: Актуальные предложения по ремонту -->
    <div class="offers-section">
        <h2 class="text-center mb-4">📌 Актуальные предложения</h2>
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="offer-card">
                    <div class="offer-icon">
                        <i class="fas fa-desktop"></i>
                    </div>
                    <h4>Ремонт компьютеров</h4>
                    <p>Диагностика и ремонт системных блоков любой сложности</p>
                    <div class="offer-price">от 500 ₽</div>
                    <a href="<?php echo e(route('order')); ?>" class="btn btn-offer">Заказать →</a>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="offer-card">
                    <div class="offer-icon">
                        <i class="fas fa-laptop"></i>
                    </div>
                    <h4>Ремонт ноутбуков</h4>
                    <p>Замена матрицы, клавиатуры, чистка от пыли</p>
                    <div class="offer-price">от 1000 ₽</div>
                    <a href="<?php echo e(route('order')); ?>" class="btn btn-offer">Заказать →</a>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="offer-card">
                    <div class="offer-icon">
                        <i class="fas fa-microchip"></i>
                    </div>
                    <h4>Замена комплектующих</h4>
                    <p>Процессор, видеокарта, ОЗУ, SSD, блок питания</p>
                    <div class="offer-price">от 800 ₽</div>
                    <a href="<?php echo e(route('order')); ?>" class="btn btn-offer">Заказать →</a>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="offer-card">
                    <div class="offer-icon">
                        <i class="fas fa-window-restore"></i>
                    </div>
                    <h4>Установка ПО</h4>
                    <p>Windows, драйверы, антивирусы, офисные программы</p>
                    <div class="offer-price">от 400 ₽</div>
                    <a href="<?php echo e(route('order')); ?>" class="btn btn-offer">Заказать →</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Блок 2: Акции -->
    <div class="promotions-section mt-5">
        <h2 class="text-center mb-4">🎯 Наши акции</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="promo-card">
                    <div class="promo-badge">-20%</div>
                    <div class="promo-body">
                        <i class="fas fa-tools promo-icon"></i>
                        <h4>Комплексный ремонт</h4>
                        <p>Скидка 20% при заказе ремонта + диагностики</p>
                        <div class="promo-old">от 2500 ₽</div>
                        <div class="promo-new">от 2000 ₽</div>
                        <a href="<?php echo e(route('order')); ?>" class="promo-link">Записаться →</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="promo-card">
                    <div class="promo-badge">-30%</div>
                    <div class="promo-body">
                        <i class="fas fa-fan promo-icon"></i>
                        <h4>Чистка ноутбука</h4>
                        <p>Чистка от пыли и замена термопасты со скидкой</p>
                        <div class="promo-old">от 1500 ₽</div>
                        <div class="promo-new">от 1050 ₽</div>
                        <a href="<?php echo e(route('order')); ?>" class="promo-link">Записаться →</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="promo-card">
                    <div class="promo-badge">ПОДАРОК</div>
                    <div class="promo-body">
                        <i class="fas fa-gift promo-icon"></i>
                        <h4>Установка Windows</h4>
                        <p>При ремонте от 3000 ₽ — установка Windows бесплатно</p>
                        <div class="promo-gift">Бесплатно!</div>
                        <a href="<?php echo e(route('order')); ?>" class="promo-link">Записаться →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Блок 3: Новости -->
    <div class="news-section mt-5">
        <h2 class="text-center mb-4">📰 Новости компании</h2>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="news-card">
                    <div class="news-date">
                        <i class="fas fa-calendar-alt"></i> 15 мая 2026
                    </div>
                    <h4>Новый сервисный центр на Юго-Западной</h4>
                    <p>Мы открыли новый сервисный центр. Теперь ремонт компьютеров стал еще доступнее для жителей Юго-Западного района.</p>
                    <a href="#" class="news-link">Читать далее →</a>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="news-card">
                    <div class="news-date">
                        <i class="fas fa-calendar-alt"></i> 10 мая 2026
                    </div>
                    <h4>Новые мастера в команде</h4>
                    <p>К нашей команде присоединились два специалиста по ремонту MacBook. Прием заявок на Apple-технику открыт!</p>
                    <a href="#" class="news-link">Читать далее →</a>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="news-card">
                    <div class="news-date">
                        <i class="fas fa-calendar-alt"></i> 5 мая 2026
                    </div>
                    <h4>График работы на майские праздники</h4>
                    <p>С 1 по 10 мая работаем с 10:00 до 18:00. 9 мая — выходной. Планируйте визит заранее.</p>
                    <a href="#" class="news-link">Читать далее →</a>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="news-card">
                    <div class="news-date">
                        <i class="fas fa-calendar-alt"></i> 28 апреля 2026
                    </div>
                    <h4>Снижение цен на замену процессоров</h4>
                    <p>Стали официальными партнерами Intel и AMD. Цены на замену процессоров снижены на 15%.</p>
                    <a href="#" class="news-link">Читать далее →</a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    /* Блок актуальных предложений */
    .offers-section {
        margin-bottom: 20px;
    }
    
    .offer-card {
        background: white;
        border-radius: 15px;
        padding: 25px 20px;
        text-align: center;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        transition: all 0.3s;
        height: 100%;
    }
    
    .offer-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    
    .offer-icon {
        font-size: 48px;
        color: #dc3545;
        margin-bottom: 15px;
    }
    
    .offer-card h4 {
        font-size: 18px;
        margin-bottom: 12px;
    }
    
    .offer-card p {
        color: #666;
        font-size: 14px;
        margin-bottom: 15px;
    }
    
    .offer-price {
        font-size: 22px;
        font-weight: bold;
        color: #2c3e50;
        margin-bottom: 15px;
    }
    
    .btn-offer {
        background: transparent;
        border: 1px solid #dc3545;
        color: #dc3545;
        border-radius: 50px;
        padding: 6px 20px;
        font-size: 14px;
        transition: 0.3s;
    }
    
    .btn-offer:hover {
        background: #dc3545;
        color: white;
    }
    
    /* Блок акций */
    .promo-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        position: relative;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        transition: all 0.3s;
        height: 100%;
    }
    
    .promo-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    
    .promo-badge {
        background: #dc3545;
        color: white;
        padding: 6px 15px;
        display: inline-block;
        font-weight: bold;
        position: absolute;
        top: 15px;
        left: 15px;
        border-radius: 20px;
        font-size: 14px;
    }
    
    .promo-body {
        padding: 60px 20px 25px 20px;
        text-align: center;
    }
    
    .promo-icon {
        font-size: 40px;
        color: #dc3545;
        margin-bottom: 15px;
    }
    
    .promo-body h4 {
        margin-bottom: 10px;
    }
    
    .promo-body p {
        color: #666;
        font-size: 14px;
        margin-bottom: 15px;
    }
    
    .promo-old {
        text-decoration: line-through;
        color: #999;
        font-size: 14px;
    }
    
    .promo-new {
        font-size: 24px;
        font-weight: bold;
        color: #dc3545;
    }
    
    .promo-gift {
        font-size: 20px;
        font-weight: bold;
        color: #28a745;
    }
    
    .promo-link {
        display: inline-block;
        margin-top: 15px;
        color: #dc3545;
        text-decoration: none;
        font-weight: 500;
    }
    
    .promo-link:hover {
        text-decoration: underline;
    }
    
    /* Блок новостей */
    .news-card {
        background: white;
        padding: 25px;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        transition: all 0.3s;
        height: 100%;
    }
    
    .news-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    
    .news-date {
        color: #dc3545;
        font-size: 13px;
        margin-bottom: 12px;
    }
    
    .news-card h4 {
        font-size: 18px;
        margin-bottom: 12px;
    }
    
    .news-card p {
        color: #666;
        line-height: 1.5;
        margin-bottom: 15px;
    }
    
    .news-link {
        color: #dc3545;
        text-decoration: none;
        font-weight: 500;
    }
    
    .news-link:hover {
        text-decoration: underline;
    }
    
    /* Адаптивность */
    @media (max-width: 768px) {
        .offer-card, .promo-card, .news-card {
            margin-bottom: 15px;
        }
        
        .offer-price {
            font-size: 18px;
        }
        
        .promo-new {
            font-size: 20px;
        }
    }
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH B:\ospanel\OSPanel\domains\localhost\resources\views/welcome.blade.php ENDPATH**/ ?>