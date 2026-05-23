@extends('layouts.app')

@section('title', 'Заявка ' . $order->order_number)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Заявка {{ $order->order_number }}</h4>
                    <a href="{{ route('orders') }}" class="btn btn-secondary btn-sm">← Назад к списку</a>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Статус:</div>
                        <div class="col-md-8">
                            @switch($order->status)
                                @case('new')
                                    <span class="badge bg-warning text-dark">🕐 Новая</span>
                                    @break
                                @case('in_progress')
                                    <span class="badge bg-info">⚙️ В работе</span>
                                    @break
                                @case('completed')
                                    <span class="badge bg-success">✅ Выполнена</span>
                                    @break
                                @case('cancelled')
                                    <span class="badge bg-danger">❌ Отменена</span>
                                    @break
                            @endswitch
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Услуга:</div>
                        <div class="col-md-8">{{ $order->service->name ?? '—' }}</div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Описание проблемы:</div>
                        <div class="col-md-8">{{ $order->description }}</div>
                    </div>
                    
                    @if($order->preferred_date)
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Предпочтительная дата:</div>
                        <div class="col-md-8">{{ $order->preferred_date->format('d.m.Y') }}</div>
                    </div>
                    @endif
                    
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Дата создания:</div>
                        <div class="col-md-8">{{ $order->created_at->format('d.m.Y H:i') }}</div>
                    </div>
                    
                    @if($order->admin_comment)
                    <div class="alert alert-info mt-3">
                        <strong>Комментарий администратора:</strong><br>
                        {{ $order->admin_comment }}
                    </div>
                    @endif
                    
                    @if($order->status == 'new')
                    <div class="mt-4">
                        <form action="{{ route('order.cancel', $order->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите отменить заявку?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Отменить заявку</button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection