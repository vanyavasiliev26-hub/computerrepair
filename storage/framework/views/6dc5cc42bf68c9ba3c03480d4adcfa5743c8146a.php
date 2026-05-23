

<?php $__env->startSection('title', 'Отзывы - Ремонт компьютеров'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <h1 class="mb-4">Отзывы наших клиентов</h1>
    
    <!-- Общий рейтинг -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-3 text-center">
                    <div class="display-1 fw-bold text-primary"><?php echo e(number_format($stats['average'], 1)); ?></div>
                    <div class="text-warning mb-2">
                        <?php for($i = 1; $i <= 5; $i++): ?>
                            <?php if($i <= round($stats['average'])): ?>
                                <i class="fas fa-star"></i>
                            <?php elseif($i - 0.5 <= $stats['average']): ?>
                                <i class="fas fa-star-half-alt"></i>
                            <?php else: ?>
                                <i class="far fa-star"></i>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                    <div class="text-muted">на основе <?php echo e($stats['total']); ?> отзывов</div>
                </div>
                <div class="col-md-9">
                    <?php $__currentLoopData = [5,4,3,2,1]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $star): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $count = $stats[$star . '_stars'];
                            $percentage = $stats['total'] > 0 ? round($count / $stats['total'] * 100) : 0;
                        ?>
                        <div class="d-flex align-items-center mb-2">
                            <div class="me-2" style="width: 40px;"><?php echo e($star); ?> <i class="fas fa-star text-warning"></i></div>
                            <div class="flex-grow-1 me-2">
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-success" style="width: <?php echo e($percentage); ?>%"></div>
                                </div>
                            </div>
                            <div style="width: 50px;"><?php echo e($percentage); ?>%</div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Список отзывов -->
    <div class="mb-4">
        <?php $__empty_1 = true; $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div>
                        <strong><?php echo e($review->user->name); ?></strong>
                        <div class="text-warning">
                            <?php for($i = 1; $i <= 5; $i++): ?>
                                <?php if($i <= $review->rating): ?>
                                    <i class="fas fa-star"></i>
                                <?php else: ?>
                                    <i class="far fa-star"></i>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <small class="text-muted"><?php echo e($review->created_at->format('d.m.Y')); ?></small>
                </div>
                <p class="mb-0"><?php echo e($review->comment); ?></p>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="text-center py-5">
            <i class="fas fa-comments fa-3x text-muted mb-3"></i>
            <h5>Пока нет отзывов</h5>
            <p class="text-muted">Будьте первым, кто оставит отзыв!</p>
        </div>
        <?php endif; ?>
    </div>
    
    <?php echo e($reviews->links()); ?>

    
    <!-- Форма добавления отзыва -->
    <?php if(auth()->guard()->check()): ?>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Оставить отзыв</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('reviews.store')); ?>">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label class="form-label">Ваша оценка</label>
                    <div class="rating-input">
                        <?php for($i = 1; $i <= 5; $i++): ?>
                            <i class="far fa-star fs-2 me-1" data-rating="<?php echo e($i); ?>" style="cursor: pointer;"></i>
                        <?php endfor; ?>
                    </div>
                    <input type="hidden" name="rating" id="rating" required>
                    <?php $__errorArgs = ['rating'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger small"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="mb-3">
                    <label for="comment" class="form-label">Ваш отзыв</label>
                    <textarea name="comment" id="comment" rows="4" class="form-control <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required><?php echo e(old('comment')); ?></textarea>
                    <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <button type="submit" class="btn btn-primary">Отправить отзыв</button>
            </form>
        </div>
    </div>
    <?php else: ?>
    <div class="alert alert-info text-center">
        <a href="<?php echo e(route('login')); ?>">Авторизуйтесь</a>, чтобы оставить отзыв
    </div>
    <?php endif; ?>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('.rating-input i');
        const ratingInput = document.getElementById('rating');
        
        stars.forEach(star => {
            star.addEventListener('mouseenter', function() {
                const rating = this.dataset.rating;
                highlightStars(rating);
            });
            
            star.addEventListener('mouseleave', function() {
                const currentRating = ratingInput.value;
                highlightStars(currentRating || 0);
            });
            
            star.addEventListener('click', function() {
                const rating = this.dataset.rating;
                ratingInput.value = rating;
                highlightStars(rating);
            });
        });
        
        function highlightStars(rating) {
            stars.forEach((star, index) => {
                if (index < rating) {
                    star.classList.add('fas');
                    star.classList.remove('far');
                    star.style.color = '#ffc107';
                } else {
                    star.classList.add('far');
                    star.classList.remove('fas');
                    star.style.color = '#ddd';
                }
            });
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\resources\views/reviews.blade.php ENDPATH**/ ?>