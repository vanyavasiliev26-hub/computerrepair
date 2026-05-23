

<?php $__env->startSection('title', 'Регистрация - Ремонт компьютеров'); ?>

<?php $__env->startSection('content'); ?>
<div class="register-page">
    <div class="register-container">
        <div class="register-card">
            <div class="register-header">
                <div class="register-icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <h2>Создать аккаунт</h2>
                <p>Заполните форму для регистрации</p>
            </div>
            
            <form method="POST" action="#">
                <!-- Имя -->
                <div class="register-field">
                    <label>Имя</label>
                    <input type="text" name="name" placeholder="Иван Иванов" required>
                </div>
                
                <!-- Email -->
                <div class="register-field">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="example@mail.ru" required>
                </div>
                
                <!-- Телефон -->
                <div class="register-field">
                    <label>Телефон (необязательно)</label>
                    <input type="tel" name="phone" placeholder="+7 (999) 123-45-67">
                </div>
                
                <!-- Пароль -->
                <div class="register-field">
                    <label>Пароль</label>
                    <input type="password" name="password" placeholder="минимум 8 символов" required>
                </div>
                
                <!-- Подтверждение пароля -->
                <div class="register-field">
                    <label>Подтверждение пароля</label>
                    <input type="password" name="password_confirmation" placeholder="повторите пароль" required>
                </div>
                
                <!-- Согласие -->
                <div class="register-checkbox">
                    <label>
                        <input type="checkbox" name="terms" required>
                        <span>Я принимаю <a href="#">условия использования</a></span>
                    </label>
                </div>
                
                <!-- Кнопка регистрации -->
                <button type="submit" class="register-btn">Зарегистрироваться</button>
                
                <!-- Разделитель -->
                <div class="register-divider">
                    <span>или</span>
                </div>
                
                <!-- Вход -->
                <div class="register-login">
                    <p>Уже есть аккаунт?</p>
                    <a href="#">Войти</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    /* Уникальные стили только для страницы регистрации */
    .register-page {
        min-height: calc(100vh - 300px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 60px 20px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .register-container {
        width: 100%;
        max-width: 480px;
        margin: 0 auto;
    }
    
    .register-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 40px 35px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }
    
    .register-header {
        text-align: center;
        margin-bottom: 30px;
    }
    
    .register-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
    }
    
    .register-icon i {
        font-size: 32px;
        color: white;
    }
    
    .register-header h2 {
        font-size: 24px;
        font-weight: 700;
        color: #1a1a2e;
        margin: 0 0 8px 0;
    }
    
    .register-header p {
        font-size: 14px;
        color: #666;
        margin: 0;
    }
    
    /* Поля ввода */
    .register-field {
        margin-bottom: 18px;
    }
    
    .register-field label {
        display: block;
        font-size: 14px;
        font-weight: 500;
        color: #333;
        margin-bottom: 6px;
    }
    
    .register-field input {
        width: 100%;
        padding: 12px 15px;
        font-size: 14px;
        border: 1px solid #ddd;
        border-radius: 10px;
        background: #f9f9f9;
        transition: all 0.3s;
        box-sizing: border-box;
    }
    
    .register-field input:focus {
        outline: none;
        border-color: #667eea;
        background: #fff;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }
    
    .register-field input::placeholder {
        color: #bbb;
    }
    
    /* Чекбокс */
    .register-checkbox {
        margin-bottom: 25px;
    }
    
    .register-checkbox label {
        display: flex;
        align-items: center;
        cursor: pointer;
        font-size: 14px;
        color: #555;
    }
    
    .register-checkbox input {
        width: 16px;
        height: 16px;
        margin-right: 8px;
        cursor: pointer;
    }
    
    .register-checkbox span {
        cursor: pointer;
    }
    
    .register-checkbox a {
        color: #667eea;
        text-decoration: none;
    }
    
    .register-checkbox a:hover {
        text-decoration: underline;
    }
    
    /* Кнопка */
    .register-btn {
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
    
    .register-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
    }
    
    /* Разделитель */
    .register-divider {
        text-align: center;
        margin: 25px 0;
        position: relative;
    }
    
    .register-divider::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 1px;
        background: #e0e0e0;
    }
    
    .register-divider span {
        background: white;
        padding: 0 15px;
        position: relative;
        color: #999;
        font-size: 13px;
    }
    
    /* Блок входа */
    .register-login {
        text-align: center;
    }
    
    .register-login p {
        color: #666;
        font-size: 14px;
        margin: 0 0 8px 0;
    }
    
    .register-login a {
        color: #667eea;
        text-decoration: none;
        font-weight: 600;
        font-size: 15px;
        transition: all 0.3s;
    }
    
    .register-login a:hover {
        color: #764ba2;
        text-decoration: underline;
    }
    
    /* Адаптивность */
    @media (max-width: 576px) {
        .register-page {
            padding: 40px 15px;
        }
        
        .register-card {
            padding: 30px 25px;
        }
        
        .register-header h2 {
            font-size: 22px;
        }
        
        .register-icon {
            width: 55px;
            height: 55px;
        }
        
        .register-icon i {
            font-size: 26px;
        }
    }
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH B:\ospanel\OSPanel\domains\localhost\resources\views/auth/register.blade.php ENDPATH**/ ?>