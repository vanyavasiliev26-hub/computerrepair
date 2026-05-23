@extends('admin.layouts.admin')

@section('title', 'Дашборд')

@section('content')
<!-- Статистика в 4 карточках -->
<div class="row g-4">
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted mb-1">Всего заявок</h6>
                    <h2 class="mb-0">{{ $stats['total_orders'] }}</h2>
                    @if($stats['new_orders'] > 0)
                        <small class="text-warning">🆕 Новых: {{ $stats['new_orders'] }}</small>
                    @endif
                </div>
                <div class="icon">
                    <i class="fas fa-clipboard-list fa-2x text-primary"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted mb-1">Пользователей</h6>
                    <h2 class="mb-0">{{ $stats['total_users'] }}</h2>
                </div>
                <div class="icon">
                    <i class="fas fa-users fa-2x text-primary"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted mb-1">Отзывы</h6>
                    <h2 class="mb-0">{{ $stats['total_reviews'] }}</h2>
                    @if($stats['pending_reviews'] > 0)
                        <small class="text-warning">⏳ На модерации: {{ $stats['pending_reviews'] }}</small>
                    @endif
                </div>
                <div class="icon">
                    <i class="fas fa-star fa-2x text-primary"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted mb-1">Услуг в каталоге</h6>
                    <h2 class="mb-0">{{ $stats['total_services'] }}</h2>
                </div>
                <div class="icon">
                    <i class="fas fa-cogs fa-2x text-primary"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Топ услуг и последние заявки в одной строке -->
<div class="row mt-4">
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header bg-white">
                <strong><i class="fas fa-chart-simple me-2"></i>Топ услуг</strong>
            </div>
            <div class="card-body">
                @if($topServices->count() > 0)
                    <div class="list-group list-group-flush">
                        @foreach($topServices as $item)
                        <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <div>
                                <span class="fw-bold me-2">{{ $loop->iteration }}.</span>
                                {{ $item->service->name ?? '—' }}
                            </div>
                            <span class="badge bg-primary rounded-pill">{{ $item->total }} заявок</span>
                        </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted text-center py-3">Нет данных</p>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header bg-white">
                <strong><i class="fas fa-clock me-2"></i>Последние заявки</strong>
            </div>
            <div class="card-body">
                @if($recentOrders->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-sm table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Клиент</th>
                                    <th>Статус</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentOrders as $order)
                                <tr>
                                    <td>#{{ $order->order_number }}</td>
                                    <td>{{ $order->user->name ?? '—' }}</td>
                                    <td>
                                        @switch($order->status)
                                            @case('new')
                                                <span class="badge bg-warning text-dark">🆕 Новая</span>
                                                @break
                                            @case('in_progress')
                                                <span class="badge bg-info">⚙️ В работе</span>
                                                @break
                                            @case('completed')
                                                <span class="badge bg-success">✅ Выполнена</span>
                                                @break
                                            @case('cancelled')
                                                <span class="badge bg-secondary">❌ Отменена</span>
                                                @break
                                        @endswitch
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted text-center py-3">Нет заявок</p>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Быстрые ссылки -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-white">
                <strong><i class="fas fa-bolt me-2"></i>Быстрые действия</strong>
            </div>
            <div class="card-body">
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('admin.orders') }}?status=new" class="btn btn-outline-warning btn-sm">
                        <i class="fas fa-eye"></i> Просмотреть новые заявки
                        @if($stats['new_orders'] > 0)
                            <span class="badge bg-warning text-dark ms-1">{{ $stats['new_orders'] }}</span>
                        @endif
                    </a>
                    <a href="{{ route('admin.reviews') }}" class="btn btn-outline-info btn-sm">
                        <i class="fas fa-star"></i> Модерация отзывов
                        @if($stats['pending_reviews'] > 0)
                            <span class="badge bg-info ms-1">{{ $stats['pending_reviews'] }}</span>
                        @endif
                    </a>
                    <a href="{{ route('admin.services.create') }}" class="btn btn-outline-success btn-sm">
                        <i class="fas fa-plus"></i> Добавить услугу
                    </a>
                    <a href="{{ route('admin.promotions') }}" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-tags"></i> Управление акциями
                    </a>
                    <a href="{{ route('admin.news') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-newspaper"></i> Добавить новость
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.stat-card {
    background: white;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    transition: transform 0.2s, box-shadow 0.2s;
}
.stat-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}
.stat-card .icon {
    opacity: 0.7;
}
.card-header {
    border-bottom: 1px solid #eef2f6;
    padding: 15px 20px;
}
.list-group-item {
    background: transparent;
    border-bottom: 1px solid #f0f0f0;
}
.list-group-item:last-child {
    border-bottom: none;
}
.btn-sm {
    padding: 6px 14px;
}
</style>
@endsection