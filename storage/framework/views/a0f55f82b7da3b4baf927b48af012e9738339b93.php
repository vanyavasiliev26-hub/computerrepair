<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Админ-панель - <?php echo $__env->yieldContent('title'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f5f5f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        /* Верхняя панель навигации */
        .navbar-top {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 12px 0;
            border-bottom: 1px solid #e0e0e0;
        }
        
        /* Горизонтальное меню */
        .admin-menu {
            background-color: #2c3e50;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 0;
        }
        
        .admin-menu .nav {
            justify-content: center;
        }
        
        .admin-menu .nav-link {
            color: #ecf0f1;
            padding: 14px 20px;
            transition: all 0.3s ease;
            border-radius: 0;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border-bottom: 2px solid transparent;
        }
        
        .admin-menu .nav-link:hover {
            background-color: #34495e;
            color: white;
        }
        
        .admin-menu .nav-link.active {
            background-color: #34495e;
            color: white;
            border-bottom-color: #3498db;
        }
        
        .admin-menu .nav-link i {
            font-size: 16px;
        }
        
        /* Карточки статистики */
        .stat-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            transition: transform 0.2s, box-shadow 0.2s;
            border: 1px solid #e0e0e0;
        }
        
        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        
        .stat-card .icon {
            font-size: 32px;
            color: #2c3e50;
        }
        
        /* Контент */
        .main-content {
            padding: 20px;
            min-height: calc(100vh - 130px);
        }
        
        /* Карточки */
        .card {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }
        
        .card-header {
            background-color: #fafafa;
            border-bottom: 1px solid #e0e0e0;
            font-weight: 600;
            padding: 15px 20px;
        }
        
        /* Адаптивность для мобильных */
        @media (max-width: 768px) {
            .admin-menu .nav {
                flex-direction: column;
            }
            
            .admin-menu .nav-link {
                justify-content: center;
            }
            
            .main-content {
                padding: 15px;
            }
        }
    </style>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
    <!-- Верхняя панель -->
    <nav class="navbar-top">
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-between align-items-center w-100">
                <div>
                    <h5 class="mb-0 text-dark">
                        <i class="fas fa-tools me-2"></i> Админ-панель
                    </h5>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <span class="text-muted">
                        <i class="fas fa-user-circle me-1"></i> <?php echo e(Auth::user()->name); ?>

                    </span>
                    <a href="<?php echo e(route('home')); ?>" class="btn btn-sm btn-outline-secondary" target="_blank">
                        <i class="fas fa-globe"></i> На сайт
                    </a>
                    <form method="POST" action="<?php echo e(route('logout')); ?>" class="d-inline">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Горизонтальное меню (по центру сверху) -->
    <div class="admin-menu">
        <div class="container-fluid px-4">
            <nav class="nav">
                <a class="nav-link <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>" href="<?php echo e(route('admin.dashboard')); ?>">
                    <i class="fas fa-chart-line"></i> Дашборд
                </a>
                <a class="nav-link <?php echo e(request()->routeIs('admin.services*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.services')); ?>">
                    <i class="fas fa-cogs"></i> Услуги
                </a>
                <a class="nav-link <?php echo e(request()->routeIs('admin.orders*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.orders')); ?>">
                    <i class="fas fa-clipboard-list"></i> Заявки
                </a>
                <a class="nav-link <?php echo e(request()->routeIs('admin.promotions*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.promotions')); ?>">
                    <i class="fas fa-tags"></i> Акции
                </a>
                <a class="nav-link <?php echo e(request()->routeIs('admin.news*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.news')); ?>">
                    <i class="fas fa-newspaper"></i> Новости
                </a>
                <a class="nav-link <?php echo e(request()->routeIs('admin.articles*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.articles')); ?>">
                    <i class="fas fa-blog"></i> Статьи
                </a>
                <a class="nav-link <?php echo e(request()->routeIs('admin.reviews*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.reviews')); ?>">
                    <i class="fas fa-star"></i> Отзывы
                </a>
            </nav>
        </div>
    </div>
    
    <!-- Основной контент -->
    <div class="main-content">
        <div class="container-fluid px-4">
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i> <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <?php if(session('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i> <?php echo e(session('error')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH C:\OSPanel\domains\localhost\resources\views/admin/layouts/admin.blade.php ENDPATH**/ ?>