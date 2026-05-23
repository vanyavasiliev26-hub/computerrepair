

<?php $__env->startSection('title', 'Полезные статьи - Ремонт компьютеров'); ?>

<?php $__env->startSection('content'); ?>
<div class="articles-page">
    <h1 class="mb-4">Полезные статьи</h1>
    <p class="lead mb-4">Советы по уходу и эксплуатации компьютерной техники</p>
    
    <div class="row">
        <!-- Статья 1 -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="article-card">
                <div class="article-icon">
                    <i class="fas fa-tachometer-alt"></i>
                </div>
                <div class="article-date">15 мая 2026</div>
                <h3>Как ускорить работу компьютера?</h3>
                <p>10 простых способов ускорить работу ПК без замены комплектующих. Чистка диска, отключение автозагрузки и другие лайфхаки.</p>
                <a href="#" class="read-more">Читать далее →</a>
            </div>
        </div>
        
        <!-- Статья 2 -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="article-card">
                <div class="article-icon">
                    <i class="fas fa-tint"></i>
                </div>
                <div class="article-date">10 мая 2026</div>
                <h3>Как правильно чистить ноутбук от пыли?</h3>
                <p>Почему перегрев убивает ноутбук и как правильно проводить профилактическую чистку в домашних условиях.</p>
                <a href="#" class="read-more">Читать далее →</a>
            </div>
        </div>
        
        <!-- Статья 3 -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="article-card">
                <div class="article-icon">
                    <i class="fas fa-shield-virus"></i>
                </div>
                <div class="article-date">5 мая 2026</div>
                <h3>Как защитить компьютер от вирусов?</h3>
                <p>Лучшие бесплатные антивирусы и правила безопасного поведения в интернете.</p>
                <a href="#" class="read-more">Читать далее →</a>
            </div>
        </div>
        
        <!-- Статья 4 -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="article-card">
                <div class="article-icon">
                    <i class="fas fa-hdd"></i>
                </div>
                <div class="article-date">28 апреля 2026</div>
                <h3>SSD или HDD: что выбрать?</h3>
                <p>Сравнение твердотельных и механических дисков. Какой накопитель лучше для игр, а какой для работы.</p>
                <a href="#" class="read-more">Читать далее →</a>
            </div>
        </div>
        
        <!-- Статья 5 -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="article-card">
                <div class="article-icon">
                    <i class="fas fa-battery-full"></i>
                </div>
                <div class="article-date">20 апреля 2026</div>
                <h3>Как продлить жизнь аккумулятору ноутбука?</h3>
                <p>Правила зарядки и эксплуатации аккумулятора, которые помогут сохранить его емкость на долгие годы.</p>
                <a href="#" class="read-more">Читать далее →</a>
            </div>
        </div>
        
        <!-- Статья 6 -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="article-card">
                <div class="article-icon">
                    <i class="fas fa-wifi"></i>
                </div>
                <div class="article-date">15 апреля 2026</div>
                <h3>Почему тормозит интернет?</h3>
                <p>Причины медленного интернета и способы их устранения. Настройка роутера и оптимизация сети.</p>
                <a href="#" class="read-more">Читать далее →</a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .article-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        transition: transform 0.3s;
        height: 100%;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    .article-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    .article-icon {
        font-size: 48px;
        color: #3498db;
        margin-bottom: 15px;
    }
    .article-date {
        color: #999;
        font-size: 12px;
        margin-bottom: 10px;
    }
    .article-card h3 {
        font-size: 18px;
        margin-bottom: 12px;
    }
    .read-more {
        color: #3498db;
        text-decoration: none;
        font-weight: 500;
        display: inline-block;
        margin-top: 10px;
    }
    .read-more:hover {
        text-decoration: underline;
    }
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\resources\views/articles.blade.php ENDPATH**/ ?>