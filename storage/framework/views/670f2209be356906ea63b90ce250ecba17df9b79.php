

<?php $__env->startSection('title', $article->title); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Главная</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('articles')); ?>">Статьи</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo e($article->title); ?></li>
        </ol>
    </nav>
    
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <?php if($article->image && file_exists(public_path($article->image))): ?>
                    <img src="<?php echo e(asset($article->image)); ?>" class="card-img-top" alt="<?php echo e($article->title); ?>">
                <?php endif; ?>
                <div class="card-body">
                    <h1 class="card-title h2 mb-3"><?php echo e($article->title); ?></h1>
                    
                    <div class="mb-4 pb-2 border-bottom">
                        <i class="far fa-calendar-alt me-1 text-muted"></i>
                        <span class="text-muted"><?php echo e($article->formatted_date); ?></span>
                    </div>
                    
                    <div class="article-content">
                        <?php echo nl2br(e($article->content)); ?>

                    </div>
                    
                    <div class="mt-4 pt-3 border-top">
                        <a href="<?php echo e(route('articles')); ?>" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left"></i> Назад к статьям
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php if($relatedArticles->count() > 0): ?>
    <div class="row mt-5">
        <div class="col-12">
            <h4 class="mb-4">Похожие статьи</h4>
        </div>
        <?php $__currentLoopData = $relatedArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <small class="text-muted"><?php echo e($related->formatted_date); ?></small>
                    <h6 class="card-title mt-2"><?php echo e($related->title); ?></h6>
                    <a href="<?php echo e(route('article.show', $related->id)); ?>" class="btn btn-link btn-sm p-0">
                        Читать <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endif; ?>
</div>

<style>
    .article-content {
        font-size: 1.05rem;
        line-height: 1.8;
        color: #333;
    }
    .article-content p {
        margin-bottom: 1.2rem;
    }
    .breadcrumb {
        background: transparent;
        padding: 0;
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\resources\views/articles/show.blade.php ENDPATH**/ ?>