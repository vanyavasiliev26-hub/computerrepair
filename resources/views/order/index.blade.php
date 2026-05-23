@extends('layouts.app')

@section('title', 'Мои заявки')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Мои заявки</h4>
            <a href="{{ route('order.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Новая заявка
            </a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            
            @if($orders->isEmpty())
                <div class="text-center py-5">
                    <i class="fas fa-clipboard-list fa-3x text-muted mb-3"></i>
                    <h5>У вас пока нет заявок</h5>
                    <p>Создайте новую заявку, и мы свяжемся с вами</p>
                    <a href="{{ route('order.create') }}" class="btn btn-primary">Создать заявку</a>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>№ заявки</th>
                                <th>Услуга</th>
                                <th>Описание</th>
                                <th>Статус</th>
                                <th>Дата создания</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td><strong>{{ $order->order_number }}</strong></td>
                                <td>{{ $order->service->name ?? '—' }}</td>
                                <td>{{ Str::limit($order->description, 50) }}</td>
                                <td>
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
                                </td>
                                <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('order.show', $order->id) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @if($order->status == 'new')
                                        <form action="{{ route('order.cancel', $order->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Отменить заявку?')">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection