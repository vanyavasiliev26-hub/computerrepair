

<?php $__env->startSection('title', 'Полезные статьи'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold mb-3">Полезные статьи</h1>
        <p class="lead text-muted">Советы по уходу и эксплуатации компьютерной техники</p>
    </div>
    
    <div class="row g-4">
        <?php $__empty_1 = true; $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                <?php if($article->image && file_exists(public_path($article->image))): ?>
                    <img src="<?php echo e(asset($article->image)); ?>" class="card-img-top" alt="<?php echo e($article->title); ?>" style="height: 200px; object-fit: cover;">
                <?php else: ?>
                    <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center" style="height: 200px;">
                        <i class="fas fa-newspaper fa-4x text-white-50"></i>
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <div class="mb-2">
                        <small class="text-muted">
                            <i class="far fa-calendar-alt"></i> <?php echo e($article->formatted_date); ?>

                        </small>
                    </div>
                    <h5 class="card-title"><?php echo e($article->title); ?></h5>
                    <p class="card-text text-muted"><?php echo e(Str::limit($article->content, 100)); ?></p>
                    <a href="<?php echo e(route('article.show', $article->id)); ?>" class="btn btn-outline-primary btn-sm">
                        Читать далее <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col-12">
            <div class="text-center py-5">
                <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                <h4>Статей пока нет</h4>
                <p class="text-muted">Скоро здесь появятся полезные материалы</p>
            </div>
        </div>
        <?php endif; ?>
    </div>
    
    <div class="d-flex justify-content-center mt-5">
        <?php echo e($articles->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\resources\views/articles/index.blade.php ENDPATH**/ ?>