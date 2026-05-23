@extends('admin.layouts.admin')

@section('title', 'Заявки')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Заявки</h2>
    <div>
        <a href="{{ route('admin.orders') }}?status=new" class="btn btn-outline-warning btn-sm">Новые</a>
        <a href="{{ route('admin.orders') }}?status=in_progress" class="btn btn-outline-info btn-sm">В работе</a>
        <a href="{{ route('admin.orders') }}?status=completed" class="btn btn-outline-success btn-sm">Выполненные</a>
        <a href="{{ route('admin.orders') }}" class="btn btn-outline-secondary btn-sm">Все</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>№ заявки</th>
                        <th>Клиент</th>
                        <th>Услуга</th>
                        <th>Статус</th>
                        <th>Дата</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td><strong>{{ $order->order_number }}</strong></td>
                        <td>{{ $order->user->name ?? '—' }}<br><small>{{ $order->user->email ?? '' }}</small></td>
                        <td>{{ $order->service->name ?? '—' }}</td>
                        <td>
                            <span class="badge bg-{{ $order->status == 'new' ? 'warning' : ($order->status == 'in_progress' ? 'info' : ($order->status == 'completed' ? 'success' : 'danger')) }}">
                                @switch($order->status)
                                    @case('new') 🕐 Новая @break
                                    @case('in_progress') ⚙️ В работе @break
                                    @case('completed') ✅ Выполнена @break
                                    @case('cancelled') ❌ Отменена @break
                                @endswitch
                            </span>
                        </td>
                        <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                        <td>
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $orders->links() }}
    </div>
</div>
@endsection