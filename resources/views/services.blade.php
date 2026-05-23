@extends('layouts.app')

@section('title', 'Услуги - Ремонт компьютеров')

@section('content')
<div class="services-page">
    <div class="container">
        <h1 class="page-title">Наши услуги</h1>
        <p class="page-subtitle">Профессиональный ремонт компьютеров и ноутбуков с гарантией качества</p>
        
        <div class="services-grid">
            @foreach($services as $service)
            <div class="service-card">
                <div class="service-image">
                    @if($service->image && file_exists(public_path($service->image)))
                        <img src="{{ asset($service->image) }}" alt="{{ $service->name }}">
                    @else
                        <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-tools" style="font-size: 48px; color: white;"></i>
                        </div>
                    @endif
                    <div class="service-price-badge">{{ number_format($service->price, 0, '', ' ') }} ₽</div>
                </div>
                <div class="service-content">
                    <div class="service-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <h3>{{ $service->name }}</h3>
                    <p>{{ Str::limit($service->description, 100) }}</p>
                    <a href="{{ route('service.show', $service->id) }}" class="btn-detail">Подробнее →</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .services-page {
        padding: 40px 0;
        background: #f8f9fa;
        min-height: calc(100vh - 300px);
    }
    
    .page-title {
        text-align: center;
        font-size: 36px;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 15px;
    }
    
    .page-subtitle {
        text-align: center;
        color: #666;
        margin-bottom: 50px;
        font-size: 16px;
    }
    
    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 30px;
    }
    
    .service-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    }
    
    .service-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    }
    
    .service-image {
        position: relative;
        height: 220px;
        overflow: hidden;
    }
    
    .service-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .service-card:hover .service-image img {
        transform: scale(1.05);
    }
    
    .service-price-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 8px 16px;
        border-radius: 30px;
        font-weight: bold;
        font-size: 16px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.2);
    }
    
    .service-content {
        padding: 25px;
        text-align: center;
    }
    
    .service-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: -45px auto 15px;
        position: relative;
        box-shadow: 0 5px 15px rgba(102,126,234,0.3);
    }
    
    .service-icon i {
        font-size: 28px;
        color: white;
    }
    
    .service-content h3 {
        font-size: 20px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 12px;
    }
    
    .service-content p {
        color: #666;
        line-height: 1.6;
        margin-bottom: 20px;
    }
    
    .btn-detail {
        display: inline-block;
        color: #667eea;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s;
    }
    
    .btn-detail:hover {
        color: #764ba2;
        transform: translateX(5px);
    }
    
    @media (max-width: 768px) {
        .services-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        
        .page-title {
            font-size: 28px;
        }
        
        .service-image {
            height: 180px;
        }
    }
</style>
@endpush