@extends('admin.layouts.admin')

@section('title', 'Редактировать статью')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Редактировать статью</h2>
    <a href="{{ route('admin.articles') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Назад
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.articles.update', $article->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="title" class="form-label">Заголовок <span class="text-danger">*</span></label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $article->title) }}" required>
            </div>
            
            <div class="mb-3">
                <label for="content" class="form-label">Содержание <span class="text-danger">*</span></label>
                <textarea name="content" id="content" rows="10" class="form-control" required>{{ old('content', $article->content) }}</textarea>
            </div>
            
            <div class="mb-3">
                <label for="image" class="form-label">Изображение</label>
                @if($article->image && file_exists(public_path($article->image)))
                    <div class="mb-2">
                        <img src="{{ asset($article->image) }}" style="max-width: 200px; max-height: 150px; border-radius: 8px;" class="border p-1">
                        <br>
                        <small class="text-muted">Текущее изображение</small>
                    </div>
                @endif
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                <small class="text-muted">Оставьте пустым, если не хотите менять изображение</small>
            </div>
            
            <div class="form-check mb-3">
                <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1" {{ $article->is_active ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">Активна</label>
            </div>
            
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </form>
    </div>
</div>
@endsection