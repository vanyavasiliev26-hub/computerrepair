<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Ремонт компьютеров'); ?></title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Стили -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f5f5f5;
        }
        
        /* Стили для шапки */
        .navbar {
            background-color: #2c3e50 !important;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 12px 0;
        }
        
        .navbar-brand {
            font-size: 1.3rem;
            font-weight: bold;
            color: #ffffff !important;
        }
        
        .navbar-brand i {
            color: #3498db;
            margin-right: 8px;
        }
        
        .nav-link {
            color: #ffffff !important;
            transition: 0.3s;
            font-size: 14px;
            padding: 8px 12px !important;
        }
        
        .nav-link:hover {
            color: #3498db !important;
        }
        
        /* Кнопка "Позвонить" в шапке */
        .phone-btn {
            background-color: #28a745;
            color: white;
            border-radius: 50px;
            padding: 6px 16px;
            margin-left: 10px;
            transition: 0.3s;
            display: inline-block;
            font-size: 14px;
        }
        
        .phone-btn:hover {
            background-color: #218838;
            color: white !important;
        }
        
        /* Основной контент */
        .main-content {
            flex: 1;
            padding: 30px 0;
            min-height: calc(100vh - 160px);
        }
        
        /* Упрощенный футер */
        footer {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 25px 0 15px 0;
            margin-top: auto;
            font-size: 13px;
        }
        
        footer a {
            color: #ecf0f1;
            text-decoration: none;
            transition: 0.3s;
        }
        
        footer a:hover {
            color: #3498db;
        }
        
        .copyright {
            text-align: center;
            padding-top: 15px;
            margin-top: 15px;
            border-top: 1px solid #34495e;
            font-size: 12px;
        }
        
        /* Фиксированная кнопка звонка (плавающая) */
        .floating-call-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: #28a745;
            color: white;
            width: 55px;
            height: 55px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
            transition: 0.3s;
            z-index: 1000;
            text-decoration: none;
        }
        
        .floating-call-btn:hover {
            background-color: #218838;
            transform: scale(1.1);
            color: white;
        }
        
        /* Стили для выпадающего меню */
        .dropdown {
            position: relative;
            display: inline-block;
        }
        
        .dropdown-menu {
            position: absolute;
            top: 100%;
            right: 0;
            left: auto;
            background-color: white;
            min-width: 180px;
            padding: 8px 0;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            opacity: 0;
            visibility: hidden;
            transition: 0.3s;
            z-index: 1000;
        }
        
        .dropdown:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
        }
        
        .dropdown-menu .dropdown-item {
            display: block;
            padding: 8px 20px;
            color: #333;
            text-decoration: none;
            transition: 0.3s;
            font-size: 14px;
        }
        
        .dropdown-menu .dropdown-item:hover {
            background-color: #f5f5f5;
            color: #3498db;
        }
        
        .dropdown-divider {
            height: 1px;
            background-color: #ddd;
            margin: 5px 0;
        }
        
        /* Адаптивность */
        @media (max-width: 992px) {
            .navbar-nav {
                margin-top: 10px;
            }
            
            .nav-item {
                margin: 3px 0;
            }
            
            .ms-lg-3 {
                margin-top: 10px;
            }
            
            .phone-btn {
                margin-left: 0;
                margin-top: 10px;
                display: inline-block;
            }
            
            .dropdown-menu {
                position: static;
                opacity: 1;
                visibility: visible;
                box-shadow: none;
                background: transparent;
                padding-left: 15px;
            }
            
            .dropdown-menu .dropdown-item {
                color: #ddd;
                padding: 5px 15px;
            }
            
            .dropdown-menu .dropdown-item:hover {
                background: transparent;
                color: #3498db;
            }
        }
    </style>
    
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
    <!-- ШАПКА (HEADER) - только нужные ссылки -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(route('home')); ?>">
                Ремонт Компьютеров
            </a>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('home')); ?>">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('about')); ?>">О компании</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('services')); ?>">Услуги</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('order')); ?>">Заявка</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('articles')); ?>">Статьи</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('reviews')); ?>">Отзывы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('contacts')); ?>">Контакты</a>
                    </li>
                </ul>
                
                <!-- Вход и регистрация -->
                <div class="ms-lg-3">
                    <?php if(auth()->guard()->guest()): ?>
                        <a href="<?php echo e(route('login')); ?>" class="btn btn-outline-light btn-sm">
                            <i class="fas fa-sign-in-alt"></i> Вход
                        </a>
                        <a href="<?php echo e(route('register')); ?>" class="btn btn-primary btn-sm ms-2">
                            <i class="fas fa-user-plus"></i> Регистрация
                        </a>
                    <?php else: ?>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm" style="cursor: pointer;">
                                <i class="fas fa-user"></i> <?php echo e(Auth::user()->name); ?> ▼
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php echo e(route('profile')); ?>">
                                    <i class="fas fa-id-card"></i> Личный кабинет
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> Выход
                                </a>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                
                <!-- Кнопка "Позвонить" -->
                <a href="tel:+74951234567" class="phone-btn nav-link ms-2">
                    <i class="fas fa-phone-alt"></i> Позвонить
                </a>
            </div>
        </div>
    </nav>
    
    <!-- ОСНОВНОЙ КОНТЕНТ -->
    <main class="main-content">
        <div class="container">
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" onclick="this.parentElement.style.display='none'" style="float:right; background:transparent; border:none; cursor:pointer;">✕</button>
                    <div style="clear:both"></div>
                </div>
            <?php endif; ?>
            
            <?php if(session('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo e(session('error')); ?>

                    <button type="button" class="btn-close" onclick="this.parentElement.style.display='none'" style="float:right; background:transparent; border:none; cursor:pointer;">✕</button>
                    <div style="clear:both"></div>
                </div>
            <?php endif; ?>
            
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </main>
    
    <!-- УПРОЩЕННЫЙ ФУТЕР -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-2">
                    <p class="mb-0">© <?php echo e(date('Y')); ?> Ремонт компьютеров.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="tel:+74951234567" class="me-3">+7 (495) 123-45-67</a>
                    <a href="mailto:info@comp-service.ru">info@comp-service.ru</a>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- ПЛАВАЮЩАЯ КНОПКА ЗВОНКА -->
    <a href="tel:+74951234567" class="floating-call-btn">
        <i class="fas fa-phone-alt"></i>
    </a>
    
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH B:\ospanel\OSPanel\domains\localhost\resources\views/layouts/app.blade.php ENDPATH**/ ?>