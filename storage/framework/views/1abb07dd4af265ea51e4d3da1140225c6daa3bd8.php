

<?php $__env->startSection('title', 'Вход - Ремонт компьютеров'); ?>

<?php $__env->startSection('content'); ?>
<div class="login-page">
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="login-icon">
                    <i class="fas fa-laptop-code"></i>
                </div>
                <h2>Добро пожаловать!</h2>
                <p>Войдите в свой аккаунт, чтобы продолжить</p>
            </div>
            
            <form method="POST" action="#">
                <!-- Email -->
                <div class="login-field">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="example@mail.ru" required>
                </div>
                
                <!-- Пароль -->
                <div class="login-field">
                    <label>Пароль</label>
                    <input type="password" name="password" placeholder="••••••••" required>
                </div>
                
                <!-- Запомнить меня -->
                <div class="login-checkbox">
                    <label>
                        <input type="checkbox" name="remember">
                        <span>Запомнить меня</span>
                    </label>
                </div>
                
                <!-- Кнопка -->
                <button type="submit" class="login-btn">Войти</button>
                
                <!-- Разделитель -->
                <div class="login-divider">
                    <span>или</span>
                </div>
                
                <!-- Регистрация -->
                <div class="login-register">
                    <p>Нет аккаунта?</p>
                    <a href="#">Создать аккаунт</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    /* Уникальные стили только для страницы входа */
    .login-page {
        min-height: calc(100vh - 300px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 60px 20px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .login-container {
        width: 100%;
        max-width: 450px;
        margin: 0 auto;
    }
    
    .login-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 40px 35px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }
    
    .login-header {
        text-align: center;
        margin-bottom: 30px;
    }
    
    .login-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
    }
    
    .login-icon i {
        font-size: 32px;
        color: white;
    }
    
    .login-header h2 {
        font-size: 24px;
        font-weight: 700;
        color: #1a1a2e;
        margin: 0 0 8px 0;
    }
    
    .login-header p {
        font-size: 14px;
        color: #666;
        margin: 0;
    }
    
    /* Поля ввода */
    .login-field {
        margin-bottom: 20px;
    }
    
    .login-field label {
        display: block;
        font-size: 14px;
        font-weight: 500;
        color: #333;
        margin-bottom: 8px;
    }
    
    .login-field input {
        width: 100%;
        padding: 12px 15px;
        font-size: 14px;
        border: 1px solid #ddd;
        border-radius: 10px;
        background: #f9f9f9;
        transition: all 0.3s;
        box-sizing: border-box;
    }
    
    .login-field input:focus {
        outline: none;
        border-color: #667eea;
        background: #fff;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }
    
    .login-field input::placeholder {
        color: #bbb;
    }
    
    /* Чекбокс */
    .login-checkbox {
        margin-bottom: 25px;
    }
    
    .login-checkbox label {
        display: flex;
        align-items: center;
        cursor: pointer;
        font-size: 14px;
        color: #555;
    }
    
    .login-checkbox input {
        width: 16px;
        height: 16px;
        margin-right: 8px;
        cursor: pointer;
    }
    
    .login-checkbox span {
        cursor: pointer;
    }
    
    /* Кнопка */
    .login-btn {
        width: 100%;
        padding: 12px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
    }
    
    .login-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
    }
    
    /* Разделитель */
    .login-divider {
        text-align: center;
        margin: 25px 0;
        position: relative;
    }
    
    .login-divider::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 1px;
        background: #e0e0e0;
    }
    
    .login-divider span {
        background: white;
        padding: 0 15px;
        position: relative;
        color: #999;
        font-size: 13px;
    }
    
    /* Блок регистрации */
    .login-register {
        text-align: center;
    }
    
    .login-register p {
        color: #666;
        font-size: 14px;
        margin: 0 0 8px 0;
    }
    
    .login-register a {
        color: #667eea;
        text-decoration: none;
        font-weight: 600;
        font-size: 15px;
        transition: all 0.3s;
    }
    
    .login-register a:hover {
        color: #764ba2;
        text-decoration: underline;
    }
    
    /* Адаптивность */
    @media (max-width: 576px) {
        .login-page {
            padding: 40px 15px;
        }
        
        .login-card {
            padding: 30px 25px;
        }
        
        .login-header h2 {
            font-size: 22px;
        }
        
        .login-icon {
            width: 55px;
            height: 55px;
        }
        
        .login-icon i {
            font-size: 26px;
        }
    }
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH B:\ospanel\OSPanel\domains\localhost\resources\views/auth/login.blade.php ENDPATH**/ ?>