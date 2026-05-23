@extends('layouts.app')

@section('title', 'Контакты - Ремонт компьютеров')

@section('content')
<div class="contacts-page">
    <h1 class="mb-4">Контакты</h1>
    
    <div class="row">
        <div class="col-md-5 mb-4">
            <div class="contact-info-card">
                <h3><i class="fas fa-map-marker-alt text-danger"></i> Адрес</h3>
                <p>г. Москва, ул. Ленина, д. 10, офис 305</p>
                <p class="text-muted">(м. Тверская, выход к гостинице «Москва»)</p>
                
                <h3 class="mt-4"><i class="fas fa-phone-alt text-success"></i> Телефон</h3>
                <p><strong>+7 (495) 123-45-67</strong></p>
                <p><strong>+7 (800) 555-33-22</strong> (бесплатно по России)</p>
                
                <h3 class="mt-4"><i class="fas fa-envelope text-primary"></i> Email</h3>
                <p><a href="mailto:info@comp-service.ru">info@comp-service.ru</a></p>
                
                <h3 class="mt-4"><i class="fas fa-clock text-info"></i> Режим работы</h3>
                <table class="table table-sm">
                    <tr><td>Понедельник - Пятница</td><td>10:00 - 20:00</td></tr>
                    <tr><td>Суббота</td><td>11:00 - 18:00</td></tr>
                    <tr><td>Воскресенье</td><td>выходной</td></tr>
                </table>
                
                <h3 class="mt-4"><i class="fas fa-share-alt"></i> Мы в соцсетях</h3>
                <div class="social-links mt-2">
                    <a href="#" class="btn btn-outline-primary me-2"><i class="fab fa-vk"></i> VK</a>
                    <a href="#" class="btn btn-outline-info me-2"><i class="fab fa-telegram"></i> Telegram</a>
                    <a href="#" class="btn btn-outline-success"><i class="fab fa-whatsapp"></i> WhatsApp</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-7 mb-4">
            <div class="map-card">
                <h3><i class="fas fa-map"></i> Схема проезда</h3>
                <!-- Яндекс.Карта (iframe) -->
                <div class="map-container mt-3">
                    <iframe 
                        src="https://yandex.ru/map-widget/v1/?um=constructor%3A123456789&source=constructor" 
                        width="100%" 
                        height="400" 
                        frameborder="0"
                        style="border-radius: 15px;">
                    </iframe>
                </div>
                <p class="text-muted mt-2 small">* Карта загружается с сервера Яндекс.Карт</p>
            </div>
        </div>
    </div>
    
    <!-- Форма обратной связи -->
    <div class="feedback-form mt-4">
        <h3>Написать нам</h3>
        <form method="POST" action="#">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <input type="text" class="form-control" placeholder="Ваше имя" required>
                </div>
                <div class="col-md-6 mb-3">
                    <input type="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="col-12 mb-3">
                    <textarea class="form-control" rows="4" placeholder="Сообщение" required></textarea>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<style>
    .contact-info-card, .map-card, .feedback-form {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        height: 100%;
    }
    .contact-info-card h3 {
        font-size: 18px;
        margin-bottom: 10px;
    }
    .feedback-form {
        margin-top: 20px;
    }
</style>
@endpush