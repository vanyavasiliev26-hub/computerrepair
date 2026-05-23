@extends('admin.layouts.admin')

@section('title', 'Добавить статью')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Добавить статью</h2>
    <a href="{{ route('admin.articles') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Назад
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.articles.store') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label for="title" class="form-label">Заголовок <span class="text-danger">*</span></label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label for="content" class="form-label">Содержание <span class="text-danger">*</span></label>
                <textarea name="content" id="content" rows="10" class="form-control" required></textarea>
            </div>
            
            <div class="mb-3">
                <label for="image" class="form-label">Изображение</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                <small class="text-muted">Поддерживаются: jpeg, png, jpg, webp. Максимум 2MB</small>
            </div>
            
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </form>
    </div>
</div>
@endsection