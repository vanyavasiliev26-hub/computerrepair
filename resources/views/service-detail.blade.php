@extends('layouts.app')

@section('title', $service->name . ' - Ремонт компьютеров')

@section('content')
<div class="service-detail-page">
    <div class="container">
        <!-- Хлебные крошки -->
        <nav class="breadcrumb-nav">
            <a href="{{ route('home') }}">Главная</a> /
            <a href="{{ route('services') }}">Услуги</a> /
            <span>{{ $service->name }}</span>
        </nav>
        
        <div class="service-detail">
            <div class="row">
                <div class="col-lg-6">
                    <div class="service-gallery">
                        <div class="main-image">
                            @if($service->image && file_exists(public_path($service->image)))
                                <img src="{{ asset($service->image) }}" alt="{{ $service->name }}" id="mainImage">
                            @else
                                <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-tools" style="font-size: 64px; color: white;"></i>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="service-info">
                        <div class="service-icon-large">
                            <i class="fas fa-tools"></i>
                        </div>
                        <h1>{{ $service->name }}</h1>
                        
                        <div class="service-price-large">
                            Стоимость: <span>{{ number_format($service->price, 0, '', ' ') }} ₽</span>
                        </div>
                        
                        <div class="service-description">
                            <h3>Описание услуги</h3>
                            <p>{{ $service->description }}</p>
                        </div>
                        
                        <div class="service-features">
                            <h3>Что входит в услугу</h3>
                            <ul>
                                <li><i class="fas fa-check-circle"></i> Бесплатная диагностика</li>
                                <li><i class="fas fa-check-circle"></i> Гарантия на все работы</li>
                                <li><i class="fas fa-check-circle"></i> Оригинальные запчасти</li>
                                <li><i class="fas fa-check-circle"></i> Выезд мастера на дом</li>
                            </ul>
                        </div>
                        
                        <div class="service-actions">
                            <a href="{{ route('order') }}?service={{ $service->id }}" class="btn-order">
                                <i class="fas fa-clipboard-list"></i> Заказать услугу
                            </a>
                            <a href="tel:+74951234567" class="btn-call">
                                <i class="fas fa-phone-alt"></i> Позвонить
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Другие услуги -->
        @php
            $otherServices = App\Models\Service::where('id', '!=', $service->id)
                ->limit(3)
                ->get();
        @endphp
        
        @if($otherServices->count() > 0)
        <div class="other-services">
            <h2>Другие услуги</h2>
            <div class="other-services-grid">
                @foreach($otherServices as $other)
                <div class="other-service-card">
                    <div class="other-service-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <h4>{{ $other->name }}</h4>
                    <p>{{ number_format($other->price, 0, '', ' ') }} ₽</p>
                    <a href="{{ route('service.show', $other->id) }}">Подробнее →</a>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

@push('styles')
<style>
    .service-detail-page {
        padding: 40px 0;
        background: #f8f9fa;
        min-height: calc(100vh - 300px);
    }
    
    .breadcrumb-nav {
        margin-bottom: 30px;
        font-size: 14px;
        color: #666;
    }
    
    .breadcrumb-nav a {
        color: #667eea;
        text-decoration: none;
    }
    
    .breadcrumb-nav a:hover {
        text-decoration: underline;
    }
    
    .service-detail {
        background: white;
        border-radius: 25px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        margin-bottom: 50px;
    }
    
    .service-gallery {
        position: relative;
    }
    
    .main-image {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        min-height: 300px;
    }
    
    .main-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .service-icon-large {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
    }
    
    .service-icon-large i {
        font-size: 40px;
        color: white;
    }
    
    .service-info h1 {
        font-size: 32px;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 20px;
    }
    
    .service-price-large {
        background: #f0f4ff;
        padding: 15px 20px;
        border-radius: 15px;
        margin-bottom: 25px;
    }
    
    .service-price-large span {
        font-size: 28px;
        font-weight: bold;
        color: #667eea;
    }
    
    .service-description h3,
    .service-features h3 {
        font-size: 18px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 15px;
    }
    
    .service-description p {
        color: #666;
        line-height: 1.7;
        margin-bottom: 25px;
    }
    
    .service-features ul {
        list-style: none;
        padding: 0;
        margin-bottom: 30px;
    }
    
    .service-features li {
        margin-bottom: 10px;
        color: #555;
    }
    
    .service-features li i {
        color: #28a745;
        margin-right: 10px;
    }
    
    .service-actions {
        display: flex;
        gap: 15px;
    }
    
    .btn-order, .btn-call {
        padding: 14px 28px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s;
        text-align: center;
        flex: 1;
    }
    
    .btn-order {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }
    
    .btn-order:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 20px rgba(102,126,234,0.4);
        color: white;
    }
    
    .btn-call {
        background: #28a745;
        color: white;
    }
    
    .btn-call:hover {
        transform: translateY(-3px);
        background: #218838;
        color: white;
    }
    
    .other-services {
        margin-top: 30px;
    }
    
    .other-services h2 {
        font-size: 24px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 25px;
        text-align: center;
    }
    
    .other-services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
    }
    
    .other-service-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        text-align: center;
        transition: all 0.3s;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .other-service-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    
    .other-service-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
    }
    
    .other-service-icon i {
        font-size: 24px;
        color: white;
    }
    
    .other-service-card h4 {
        font-size: 16px;
        margin-bottom: 10px;
    }
    
    .other-service-card p {
        color: #667eea;
        font-weight: bold;
        font-size: 18px;
        margin-bottom: 15px;
    }
    
    .other-service-card a {
        color: #667eea;
        text-decoration: none;
        font-size: 14px;
    }
    
    @media (max-width: 768px) {
        .service-detail {
            padding: 25px;
        }
        
        .service-info h1 {
            font-size: 24px;
        }
        
        .service-actions {
            flex-direction: column;
        }
        
        .main-image {
            min-height: 200px;
        }
    }
</style>
@endpush