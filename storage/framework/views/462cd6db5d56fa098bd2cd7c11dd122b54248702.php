

<?php $__env->startSection('title', 'Вход - Ремонт компьютеров'); ?>

<?php $__env->startSection('content'); ?>
<div class="auth-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="auth-card">
                    <div class="auth-header">
                        <h2>Вход в систему</h2>
                        <p>Войдите в свой аккаунт</p>
                    </div>
                    
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>
                        
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('email')); ?>" required>
                            <?php $__errorArgs = ['email'];
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
                        
                        <div class="mb-3">
                            <label class="form-label">Пароль</label>
                            <input type="password" name="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                            <?php $__errorArgs = ['password'];
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
                        
                        <div class="mb-3 form-check">
                            <input type="checkbox" name="remember" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Запомнить меня</label>
                        </div>
                        
                        <button type="submit" class="btn btn-auth w-100">Войти</button>
                        
                        <div class="auth-footer">
                            <p>Нет аккаунта? <a href="<?php echo e(route('register')); ?>">Зарегистрироваться</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .auth-page {
        padding: 60px 0;
        background: #f5f5f5;
        min-height: calc(100vh - 300px);
    }
    
    .auth-card {
        background: white;
        border: 1px solid #e0e0e0;
        padding: 35px;
    }
    
    .auth-header {
        text-align: center;
        margin-bottom: 30px;
    }
    
    .auth-header h2 {
        font-size: 28px;
        font-weight: 600;
        color: #000000;
        margin-bottom: 8px;
    }
    
    .auth-header p {
        color: #666;
        font-size: 14px;
    }
    
    .form-label {
        font-weight: 500;
        color: #333;
        margin-bottom: 8px;
    }
    
    .form-control {
        border: 1px solid #ddd;
        border-radius: 0;
        padding: 10px 12px;
        font-size: 14px;
    }
    
    .form-control:focus {
        border-color: #000000;
        box-shadow: none;
    }
    
    .form-check-input:checked {
        background-color: #000000;
        border-color: #000000;
    }
    
    .btn-auth {
        background: #000000;
        border: 1px solid #000000;
        color: white;
        padding: 10px;
        font-size: 16px;
        font-weight: 500;
        transition: all 0.3s;
        margin-top: 10px;
    }
    
    .btn-auth:hover {
        background: #333333;
        border-color: #333333;
        color: white;
    }
    
    .auth-footer {
        text-align: center;
        margin-top: 25px;
        padding-top: 20px;
        border-top: 1px solid #e0e0e0;
    }
    
    .auth-footer p {
        margin: 0;
        color: #666;
        font-size: 14px;
    }
    
    .auth-footer a {
        color: #000000;
        text-decoration: none;
        font-weight: 500;
    }
    
    .auth-footer a:hover {
        text-decoration: underline;
    }
    
    .invalid-feedback {
        font-size: 12px;
        color: #dc3545;
    }
    
    @media (max-width: 576px) {
        .auth-card {
            padding: 25px;
        }
        
        .auth-header h2 {
            font-size: 24px;
        }
    }
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\resources\views/auth/login.blade.php ENDPATH**/ ?>