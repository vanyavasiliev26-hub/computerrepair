@extends('layouts.app')

@section('title', 'Новая заявка')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Создание заявки</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('order.store') }}">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="service_id" class="form-label">Услуга <span class="text-danger">*</span></label>
                            <select name="service_id" id="service_id" class="form-select @error('service_id') is-invalid @enderror" required>
                                <option value="">Выберите услугу</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                        {{ $service->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('service_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Описание проблемы <span class="text-danger">*</span></label>
                            <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="preferred_date" class="form-label">Предпочтительная дата</label>
                            <input type="date" name="preferred_date" id="preferred_date" class="form-control @error('preferred_date') is-invalid @enderror" value="{{ old('preferred_date') }}">
                            <small class="text-muted">Необязательно. Укажите удобную дату для выполнения работ</small>
                            @error('preferred_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('orders') }}" class="btn btn-secondary">Отмена</a>
                            <button type="submit" class="btn btn-primary">Отправить заявку</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection