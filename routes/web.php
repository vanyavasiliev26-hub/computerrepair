<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

// Главная страница и статические страницы
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/reviews', [HomeController::class, 'reviews'])->name('reviews');
Route::post('/reviews', [HomeController::class, 'storeReview'])->name('reviews.store')->middleware('auth');
Route::get('/contacts', [HomeController::class, 'contacts'])->name('contacts');

// Статьи
Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('article.show');

// Услуги (детальная страница) - используем id вместо slug
Route::get('/services/{id}', [ServiceController::class, 'show'])->name('service.show');

// Аутентификация
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Профиль и заявки (только для авторизованных)
Route::middleware(['auth'])->group(function () {
    // Профиль
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/password', [AuthController::class, 'updatePassword'])->name('profile.password');
    
    // Заявки
    Route::get('/order', [OrderController::class, 'create'])->name('order');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::get('/order/create', [OrderController::class, 'create'])->name('order.create');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
    Route::get('/order/{id}', [OrderController::class, 'show'])->name('order.show');
    Route::delete('/order/{id}/cancel', [OrderController::class, 'cancel'])->name('order.cancel');
});

// Админ панель (только для администраторов)
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    // Дашборд
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Услуги
    Route::get('/services', [AdminController::class, 'services'])->name('services');
    Route::get('/services/create', [AdminController::class, 'createService'])->name('services.create');
    Route::post('/services', [AdminController::class, 'storeService'])->name('services.store');
    Route::get('/services/{id}/edit', [AdminController::class, 'editService'])->name('services.edit');
    Route::put('/services/{id}', [AdminController::class, 'updateService'])->name('services.update');
    Route::delete('/services/{id}', [AdminController::class, 'deleteService'])->name('services.delete');

    // Заявки
    Route::get('/orders', [AdminController::class, 'orders'])->name('orders');
    Route::get('/orders/{id}', [AdminController::class, 'showOrder'])->name('orders.show');
    Route::put('/orders/{id}/status', [AdminController::class, 'updateOrderStatus'])->name('orders.status');
    
    // Акции
    Route::get('/promotions', [AdminController::class, 'promotions'])->name('promotions');
    Route::post('/promotions', [AdminController::class, 'storePromotion'])->name('promotions.store');
    Route::put('/promotions/{id}', [AdminController::class, 'updatePromotion'])->name('promotions.update');
    Route::delete('/promotions/{id}', [AdminController::class, 'deletePromotion'])->name('promotions.delete');
    
    // Новости
    Route::get('/news', [AdminController::class, 'news'])->name('news');
    Route::post('/news', [AdminController::class, 'storeNews'])->name('news.store');
    Route::put('/news/{id}', [AdminController::class, 'updateNews'])->name('news.update');
    Route::delete('/news/{id}', [AdminController::class, 'deleteNews'])->name('news.delete');
    
    // Отзывы
    Route::get('/reviews', [AdminController::class, 'reviews'])->name('reviews');
    Route::post('/reviews/{id}/approve', [AdminController::class, 'approveReview'])->name('reviews.approve');
    Route::delete('/reviews/{id}', [AdminController::class, 'deleteReview'])->name('reviews.delete');
    
    // Статьи
    Route::get('/articles', [AdminController::class, 'articles'])->name('articles');
    Route::post('/articles', [AdminController::class, 'storeArticle'])->name('articles.store');
    Route::get('/articles/{id}/edit', [AdminController::class, 'editArticle'])->name('articles.edit');
    Route::put('/articles/{id}', [AdminController::class, 'updateArticle'])->name('articles.update');
    Route::delete('/articles/{id}', [AdminController::class, 'deleteArticle'])->name('articles.delete');
    Route::get('/articles/create', [AdminController::class, 'createArticle'])->name('articles.create');

    Route::delete('/services/{id}/image', [AdminController::class, 'deleteServiceImage'])->name('services.image.delete');
});