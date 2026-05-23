@extends('admin.layouts.admin')

@section('title', 'Статьи')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Статьи</h2>
    <a href="{{ route('admin.articles.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Добавить статью
    </a>
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
                    @foreach($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>
                            @if($article->image && file_exists(public_path($article->image)))
                                <img src="{{ asset($article->image) }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px;">
                            @else
                                <div style="width: 50px; height: 50px; background: #f0f0f0; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-newspaper text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>{{ $article->title }}</td>
                        <td>
                            <span class="badge bg-{{ $article->is_active ? 'success' : 'danger' }}">
                                {{ $article->is_active ? 'Активна' : 'Неактивна' }}
                            </span>
                        </td>
                        <td>{{ $article->published_at ? $article->published_at->format('d.m.Y') : $article->created_at->format('d.m.Y') }}</td>
                        <td>
                            <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.articles.delete', $article->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Удалить статью?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $articles->links() }}
    </div>
</div>
@endsection