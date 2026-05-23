@extends('admin.layouts.admin')

@section('title', 'Услуги')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Услуги</h2>
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Добавить услугу
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th style="width: 50px">ID</th>
                        <th style="width: 80px">Изображение</th>
                        <th>Название</th>
                        <th>Цена</th>
                        <th style="width: 120px">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td>
                            @if($service->image && file_exists(public_path($service->image)))
                                <img src="{{ asset($service->image) }}" alt="{{ $service->name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px;">
                            @else
                                <div style="width: 50px; height: 50px; background: #f0f0f0; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-image text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <strong>{{ $service->name }}</strong><br>
                            <small class="text-muted">{{ Str::limit($service->description, 60) }}</small>
                        </td>
                        <td>
                            @if($service->price)
                                {{ number_format($service->price, 2) }} ₽
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.services.delete', $service->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Удалить услугу?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection