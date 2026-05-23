@extends('admin.layouts.admin')

@section('title', 'Заявка ' . $order->order_number)

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Заявка #{{ $order->order_number }}</h2>
    <a href="{{ route('admin.orders') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Назад
    </a>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Информация о заявке</div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th style="width: 150px">Номер:</th>
                        <td>{{ $order->order_number }}</td>
                    </tr>
                    <tr>
                        <th>Статус:</th>
                        <td>
                            <form method="POST" action="{{ route('admin.orders.status', $order->id) }}" class="d-inline">
                                @csrf
                                @method('PUT')
                                <select name="status" class="form-select form-select-sm d-inline-block" style="width: auto" onchange="this.form.submit()">
                                    <option value="new" {{ $order->status == 'new' ? 'selected' : '' }}>🕐 Новая</option>
                                    <option value="in_progress" {{ $order->status == 'in_progress' ? 'selected' : '' }}>⚙️ В работе</option>
                                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>✅ Выполнена</option>
                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>❌ Отменена</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <th>Услуга:</th>
                        <td>{{ $order->service->name ?? '—' }}</td>
                    </tr>
                    <tr>
                        <th>Описание:</th>
                        <td>{{ $order->description }}</td>
                    </tr>
                    @if($order->preferred_date)
                    <tr>
                        <th>Предпочтительная дата:</th>
                        <td>{{ $order->preferred_date->format('d.m.Y') }}</td>
                    </tr>
                    @endif
                    <tr>
                        <th>Дата создания:</th>
                        <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Клиент</div>
            <div class="card-body">
                <p><strong>Имя:</strong> {{ $order->user->name ?? '—' }}</p>
                <p><strong>Email:</strong> {{ $order->user->email ?? '—' }}</p>
                <p><strong>Телефон:</strong> {{ $order->user->phone ?? '—' }}</p>
            </div>
        </div>
    </div>
</div>
@endsection