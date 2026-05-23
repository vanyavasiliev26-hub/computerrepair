@extends('layouts.app')

@section('title', 'Отзывы - Ремонт компьютеров')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Отзывы наших клиентов</h1>
    
    <!-- Общий рейтинг -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-3 text-center">
                    <div class="display-1 fw-bold text-primary">{{ number_format($stats['average'], 1) }}</div>
                    <div class="text-warning mb-2">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= round($stats['average']))
                                <i class="fas fa-star"></i>
                            @elseif($i - 0.5 <= $stats['average'])
                                <i class="fas fa-star-half-alt"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                        @endfor
                    </div>
                    <div class="text-muted">на основе {{ $stats['total'] }} отзывов</div>
                </div>
                <div class="col-md-9">
                    @foreach([5,4,3,2,1] as $star)
                        @php
                            $count = $stats[$star . '_stars'];
                            $percentage = $stats['total'] > 0 ? round($count / $stats['total'] * 100) : 0;
                        @endphp
                        <div class="d-flex align-items-center mb-2">
                            <div class="me-2" style="width: 40px;">{{ $star }} <i class="fas fa-star text-warning"></i></div>
                            <div class="flex-grow-1 me-2">
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-success" style="width: {{ $percentage }}%"></div>
                                </div>
                            </div>
                            <div style="width: 50px;">{{ $percentage }}%</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
    <!-- Список отзывов -->
    <div class="mb-4">
        @forelse($reviews as $review)
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div>
                        <strong>{{ $review->user->name }}</strong>
                        <div class="text-warning">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $review->rating)
                                    <i class="fas fa-star"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor
                        </div>
                    </div>
                    <small class="text-muted">{{ $review->created_at->format('d.m.Y') }}</small>
                </div>
                <p class="mb-0">{{ $review->comment }}</p>
            </div>
        </div>
        @empty
        <div class="text-center py-5">
            <i class="fas fa-comments fa-3x text-muted mb-3"></i>
            <h5>Пока нет отзывов</h5>
            <p class="text-muted">Будьте первым, кто оставит отзыв!</p>
        </div>
        @endforelse
    </div>
    
    {{ $reviews->links() }}
    
    <!-- Форма добавления отзыва -->
    @auth
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Оставить отзыв</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('reviews.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Ваша оценка</label>
                    <div class="rating-input">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="far fa-star fs-2 me-1" data-rating="{{ $i }}" style="cursor: pointer;"></i>
                        @endfor
                    </div>
                    <input type="hidden" name="rating" id="rating" required>
                    @error('rating')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="comment" class="form-label">Ваш отзыв</label>
                    <textarea name="comment" id="comment" rows="4" class="form-control @error('comment') is-invalid @enderror" required>{{ old('comment') }}</textarea>
                    @error('comment')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Отправить отзыв</button>
            </form>
        </div>
    </div>
    @else
    <div class="alert alert-info text-center">
        <a href="{{ route('login') }}">Авторизуйтесь</a>, чтобы оставить отзыв
    </div>
    @endauth
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('.rating-input i');
        const ratingInput = document.getElementById('rating');
        
        stars.forEach(star => {
            star.addEventListener('mouseenter', function() {
                const rating = this.dataset.rating;
                highlightStars(rating);
            });
            
            star.addEventListener('mouseleave', function() {
                const currentRating = ratingInput.value;
                highlightStars(currentRating || 0);
            });
            
            star.addEventListener('click', function() {
                const rating = this.dataset.rating;
                ratingInput.value = rating;
                highlightStars(rating);
            });
        });
        
        function highlightStars(rating) {
            stars.forEach((star, index) => {
                if (index < rating) {
                    star.classList.add('fas');
                    star.classList.remove('far');
                    star.style.color = '#ffc107';
                } else {
                    star.classList.add('far');
                    star.classList.remove('fas');
                    star.style.color = '#ddd';
                }
            });
        }
    });
</script>
@endsection