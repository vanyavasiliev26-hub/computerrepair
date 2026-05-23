@extends('layouts.app')

@section('title', 'Регистрация - Ремонт компьютеров')

@section('content')
<div class="auth-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="auth-card">
                    <div class="auth-header">
                        <h2>Регистрация</h2>
                        <p>Создайте новый аккаунт</p>
                    </div>
                    
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label">Имя</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Телефон (необязательно)</label>
                            <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Пароль</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Подтверждение пароля</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                        
                        <button type="submit" class="btn btn-auth w-100">Зарегистрироваться</button>
                        
                        <div class="auth-footer">
                            <p>Уже есть аккаунт? <a href="{{ route('login') }}">Войти</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
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
@endpush