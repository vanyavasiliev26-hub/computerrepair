@extends('admin.layouts.admin')

@section('title', 'Добавить услугу')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Добавить услугу</h2>
    <a href="{{ route('admin.services') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Назад
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label for="name" class="form-label">Название <span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Описание <span class="text-danger">*</span></label>
                <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="price" class="form-label">Цена (₽)</label>
                    <input type="number" name="price" id="price" class="form-control" step="0.01" value="{{ old('price') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="image" class="form-label">Изображение</label>
                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                    <small class="text-muted">Поддерживаются: jpeg, png, jpg, webp. Максимум 2MB</small>
                    @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </form>
    </div>
</div>
@endsection