@extends('admin.layouts.admin')

@section('title', 'Новости')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Новости</h2>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewsModal">
        <i class="fas fa-plus"></i> Добавить новость
    </button>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Изображение</th>
                        <th>Заголовок</th>
                        <th>Статус</th>
                        <th>Дата</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($news as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                            @if($item->image && file_exists(public_path($item->image)))
                                <img src="{{ asset($item->image) }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px;">
                            @else
                                <div style="width: 50px; height: 50px; background: #f0f0f0; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-newspaper text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>{{ $item->title }}</td>
                        <td>
                            <span class="badge bg-{{ $item->is_active ? 'success' : 'danger' }}">
                                {{ $item->is_active ? 'Активна' : 'Неактивна' }}
                            </span>
                        </td>
                        <td>{{ $item->published_at ? $item->published_at->format('d.m.Y') : $item->created_at->format('d.m.Y') }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editNewsModal{{ $item->id }}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <form action="{{ route('admin.news.delete', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Удалить новость?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </tr>
        </div>
        {{ $news->links() }}
    </div>
</div>

<!-- Modal добавления -->
<div class="modal fade" id="addNewsModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Добавить новость</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Заголовок</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Содержание</label>
                        <textarea name="content" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Изображение</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Модальные окна редактирования -->
@foreach($news as $item)
<div class="modal fade" id="editNewsModal{{ $item->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('admin.news.update', $item->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Редактировать новость</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Заголовок</label>
                        <input type="text" name="title" class="form-control" value="{{ $item->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Содержание</label>
                        <textarea name="content" class="form-control" rows="5" required>{{ $item->content }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label>Изображение</label>
                        @if($item->image && file_exists(public_path($item->image)))
                            <div class="mb-2">
                                <img src="{{ asset($item->image) }}" style="max-width: 100%; height: 100px; object-fit: cover;">
                            </div>
                        @endif
                        <input type="file" name="image" class="form-control" accept="image/*">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="is_active" class="form-check-input" value="1" {{ $item->is_active ? 'checked' : '' }}>
                        <label class="form-check-label">Активна</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection