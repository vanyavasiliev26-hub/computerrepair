<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Ремонт компьютеров')</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap JS (необходим для работы выпадающего меню) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
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
        
        /* Стили для выпадающего меню профиля */
        .dropdown-menu {
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
            border: none;
            margin-top: 8px;
        }
        
        .dropdown-item {
            padding: 8px 20px;
            font-size: 14px;
            transition: 0.2s;
        }
        
        .dropdown-item:hover {
            background-color: #f8f9fa;
            padding-left: 25px;
        }
        
        .dropdown-item i {
            width: 20px;
            color: #6c757d;
        }
        
        .dropdown-item:hover i {
            color: #3498db;
        }
        
        .dropdown-divider {
            margin: 5px 0;
        }
        
        /* Кнопка профиля в навигации */
        .nav-link.dropdown-toggle {
            background-color: #3498db;
            border-radius: 50px;
            padding: 6px 16px !important;
            transition: 0.3s;
        }
        
        .nav-link.dropdown-toggle:hover {
            background-color: #2980b9;
        }
        
        /* Адаптивность для мобильных устройств */
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
            
            .nav-link.dropdown-toggle {
                background-color: transparent;
                padding: 8px 12px !important;
            }
            
            .dropdown-menu {
                background-color: transparent;
                box-shadow: none;
                padding-left: 20px;
            }
            
            .dropdown-item {
                color: #ffffff;
            }
            
            .dropdown-item:hover {
                background-color: transparent;
                color: #3498db;
            }
            
            .dropdown-item i {
                color: #ffffff;
            }
            
            .dropdown-item:hover i {
                color: #3498db;
            }
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- ШАПКА (HEADER) -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                🖥️ Ремонт Компьютеров
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">О компании</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('services') }}">Услуги</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('order') }}">Заявка</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('articles') }}">Статьи</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reviews') }}">Отзывы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contacts') }}">Контакты</a>
                    </li>
                    
                    <!-- Кнопка входа/регистрации / Профиль -->
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                        <i class="fas fa-id-card me-2"></i> Личный кабинет
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('orders') }}">
                                        <i class="fas fa-clipboard-list me-2"></i> Мои заявки
                                    </a>
                                </li>
                                
                                @if(Auth::user()->isAdmin())
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                            <i class="fas fa-shield-alt me-2"></i> Админ-панель
                                        </a>
                                    </li>
                                @endif
                                
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="fas fa-sign-out-alt me-2"></i> Выход
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">
                                <i class="fas fa-sign-in-alt"></i> Вход
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="btn btn-primary btn-sm ms-2">
                                <i class="fas fa-user-plus"></i> Регистрация
                            </a>
                        </li>
                    @endauth
                    
                    <!-- Кнопка "Позвонить" в шапке -->
                    <li class="nav-item">
                        <a href="tel:+74951234567" class="phone-btn nav-link ms-2">
                            <i class="fas fa-phone-alt"></i> Позвонить
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- ОСНОВНОЙ КОНТЕНТ -->
    <main class="main-content">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            @yield('content')
        </div>
    </main>
    
    <!-- УПРОЩЕННЫЙ ФУТЕР -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-2">
                    <p class="mb-0">© {{ date('Y') }} Ремонт компьютеров. Все права защищены.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="tel:+74951234567" class="me-3">
                        <i class="fas fa-phone-alt me-1"></i> +7 (495) 123-45-67
                    </a>
                    <a href="mailto:info@comp-service.ru">
                        <i class="fas fa-envelope me-1"></i> info@comp-service.ru
                    </a>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- ПЛАВАЮЩАЯ КНОПКА ЗВОНКА -->
    <a href="tel:+74951234567" class="floating-call-btn" title="Позвонить">
        <i class="fas fa-phone-alt"></i>
    </a>
    
    @stack('scripts')
    
    <!-- Дополнительный скрипт для закрытия выпадающего меню при клике вне его -->
    <script>
        document.addEventListener('click', function(event) {
            var dropdowns = document.querySelectorAll('.dropdown-menu');
            var toggles = document.querySelectorAll('.dropdown-toggle');
            
            dropdowns.forEach(function(dropdown) {
                var isClickInside = dropdown.contains(event.target);
                var isToggleClick = false;
                
                toggles.forEach(function(toggle) {
                    if (toggle.contains(event.target)) {
                        isToggleClick = true;
                    }
                });
                
                if (!isClickInside && !isToggleClick && dropdown.classList.contains('show')) {
                    bootstrap.Dropdown.getInstance(dropdown.previousElementSibling)?.hide();
                }
            });
        });
    </script>
</body>
</html>