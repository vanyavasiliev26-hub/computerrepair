

<?php $__env->startSection('title', 'Отзывы - Ремонт компьютеров'); ?>

<?php $__env->startSection('content'); ?>
<div class="reviews-page">
    <h1 class="mb-4">Отзывы наших клиентов</h1>
    
    <!-- Общий рейтинг -->
    <div class="rating-summary mb-4 p-4 bg-white rounded-3">
        <div class="row align-items-center">
            <div class="col-md-3 text-center">
                <div class="rating-number">4.8</div>
                <div class="rating-stars">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                </div>
                <div class="rating-count">на основе 127 отзывов</div>
            </div>
            <div class="col-md-9">
                <div class="rating-bars">
                    <div class="rating-bar-item">5 <i class="fas fa-star text-warning"></i> <div class="progress"><div class="progress-bar bg-success" style="width: 85%"></div></div> <span>85%</span></div>
                    <div class="rating-bar-item">4 <i class="fas fa-star text-warning"></i> <div class="progress"><div class="progress-bar bg-success" style="width: 10%"></div></div> <span>10%</span></div>
                    <div class="rating-bar-item">3 <i class="fas fa-star text-warning"></i> <div class="progress"><div class="progress-bar bg-warning" style="width: 3%"></div></div> <span>3%</span></div>
                    <div class="rating-bar-item">2 <i class="fas fa-star text-warning"></i> <div class="progress"><div class="progress-bar bg-danger" style="width: 1%"></div></div> <span>1%</span></div>
                    <div class="rating-bar-item">1 <i class="fas fa-star text-warning"></i> <div class="progress"><div class="progress-bar bg-danger" style="width: 1%"></div></div> <span>1%</span></div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Список отзывов -->
    <div class="reviews-list mb-5">
        <div class="review-item">
            <div class="review-header">
                <div class="reviewer-name">Анна Смирнова</div>
                <div class="review-date">12 мая 2026</div>
                <div class="review-stars">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
            </div>
            <div class="review-text">
                Отличный сервис! Быстро починили ноутбук, заменили клавиатуру. Вежливые мастера, дали гарантию. Рекомендую!
            </div>
        </div>
        
        <div class="review-item">
            <div class="review-header">
                <div class="reviewer-name">Дмитрий Козлов</div>
                <div class="review-date">5 мая 2026</div>
                <div class="review-stars">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
            </div>
            <div class="review-text">
                Привез компьютер с синим экраном смерти. Оказалось, проблема с видеокартой. Заменили быстро и недорого. Спасибо!
            </div>
        </div>
        
        <div class="review-item">
            <div class="review-header">
                <div class="reviewer-name">Елена Михайлова</div>
                <div class="review-date">28 апреля 2026</div>
                <div class="review-stars">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
            </div>
            <div class="review-text">
                Делали диагностику и чистку ноутбука. Стал работать тише и не греется. Цена адекватная, мастера профессионалы.
            </div>
        </div>
    </div>
    
    <!-- Форма добавления отзыва -->
    <div class="add-review-form">
        <h3>Оставить отзыв</h3>
        <form method="POST" action="#">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <input type="text" class="form-control" placeholder="Ваше имя" required>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="rating-input">
                        <label>Оценка: </label>
                        <div class="rating-select">
                            <i class="far fa-star" data-value="1"></i>
                            <i class="far fa-star" data-value="2"></i>
                            <i class="far fa-star" data-value="3"></i>
                            <i class="far fa-star" data-value="4"></i>
                            <i class="far fa-star" data-value="5"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <textarea class="form-control" rows="4" placeholder="Ваш отзыв" required></textarea>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Отправить отзыв</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .rating-summary {
        background: white;
        border-radius: 15px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    .rating-number {
        font-size: 48px;
        font-weight: bold;
        color: #2c3e50;
    }
    .rating-stars {
        color: #ffc107;
        font-size: 20px;
    }
    .rating-bar-item {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 8px;
    }
    .rating-bar-item .progress {
        flex: 1;
        height: 8px;
    }
    .review-item {
        background: white;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 15px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    .review-header {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 10px;
        margin-bottom: 10px;
    }
    .reviewer-name {
        font-weight: bold;
        font-size: 16px;
    }
    .review-date {
        color: #999;
        font-size: 12px;
    }
    .review-stars {
        color: #ffc107;
        font-size: 14px;
    }
    .add-review-form {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    .rating-select i {
        font-size: 24px;
        cursor: pointer;
        color: #ddd;
        margin-right: 5px;
    }
    .rating-select i.active {
        color: #ffc107;
    }
</style>
<script>
    // Простой скрипт для выбора рейтинга (без jQuery)
    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('.rating-select i');
        stars.forEach((star, index) => {
            star.addEventListener('mouseenter', function() {
                for(let i = 0; i <= index; i++) {
                    stars[i].classList.add('fas');
                    stars[i].classList.remove('far');
                }
            });
            star.addEventListener('mouseleave', function() {
                stars.forEach(s => {
                    s.classList.remove('fas');
                    s.classList.add('far');
                });
            });
            star.addEventListener('click', function() {
                const value = this.dataset.value;
                document.querySelector('.rating-input').dataset.rating = value;
            });
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH B:\ospanel\OSPanel\domains\localhost\resources\views/reviews.blade.php ENDPATH**/ ?>