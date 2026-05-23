

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
            
            <form method="POST" action="<?php echo e(route('register')); ?>">
                <?php echo csrf_field(); ?>
                
                <div class="register-field">
                    <label>Имя</label>
                    <input type="text" name="name" value="<?php echo e(old('name')); ?>" placeholder="Иван Иванов" required>
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="error-text"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                
                <div class="register-field">
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="example@mail.ru" required>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="error-text"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                
                <div class="register-field">
                    <label>Телефон (необязательно)</label>
                    <input type="tel" name="phone" value="<?php echo e(old('phone')); ?>" placeholder="+7 (999) 123-45-67">
                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="error-text"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                
                <div class="register-field">
                    <label>Пароль</label>
                    <input type="password" name="password" placeholder="минимум 4 символа" required>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="error-text"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                
                <div class="register-field">
                    <label>Подтверждение пароля</label>
                    <input type="password" name="password_confirmation" placeholder="повторите пароль" required>
                </div>
                
                <div class="register-checkbox">
                    <label>
                        <input type="checkbox" name="terms" required>
                        <span>Я принимаю <a href="#">условия использования</a></span>
                    </label>
                </div>
                
                <button type="submit" class="register-btn">Зарегистрироваться</button>
                
                <div class="register-divider">
                    <span>или</span>
                </div>
                
                <div class="register-login">
                    <p>Уже есть аккаунт?</p>
                    <a href="<?php echo e(route('login')); ?>">Войти</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
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
    }
    .register-card {
        background: white;
        border-radius: 20px;
        padding: 40px 35px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
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
        margin-bottom: 8px;
    }
    .register-header p {
        font-size: 14px;
        color: #666;
    }
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
        border: 1px solid #ddd;
        border-radius: 10px;
        font-size: 14px;
        transition: all 0.3s;
    }
    .register-field input:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102,126,234,0.1);
    }
    .error-text {
        display: block;
        color: #dc3545;
        font-size: 12px;
        margin-top: 5px;
    }
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
    }
    .register-checkbox a {
        color: #667eea;
        text-decoration: none;
    }
    .register-checkbox a:hover {
        text-decoration: underline;
    }
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
        box-shadow: 0 5px 15px rgba(102,126,234,0.4);
    }
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
    .register-login {
        text-align: center;
    }
    .register-login p {
        color: #666;
        font-size: 14px;
        margin-bottom: 8px;
    }
    .register-login a {
        color: #667eea;
        text-decoration: none;
        font-weight: 600;
    }
    .register-login a:hover {
        text-decoration: underline;
    }
    @media (max-width: 576px) {
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\resources\views/auth/register.blade.php ENDPATH**/ ?>