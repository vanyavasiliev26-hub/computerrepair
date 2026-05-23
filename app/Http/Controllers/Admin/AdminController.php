<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Service;
use App\Models\Review;
use App\Models\Article;
use App\Models\Promotion;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!auth()->user() || !auth()->user()->isAdmin()) {
                abort(403, 'Доступ запрещен. Только для администраторов.');
            }
            return $next($request);
        });
    }

    // ==================== ДАШБОРД ====================
    public function dashboard()
    {
        $stats = [
            'total_orders' => Order::count(),
            'new_orders' => Order::where('status', 'new')->count(),
            'total_users' => User::count(),
            'total_reviews' => Review::count(),
            'pending_reviews' => Review::where('is_approved', false)->count(),
            'total_services' => Service::count(),
            'total_articles' => Article::count(),
        ];

        $topServices = Order::select('service_id', DB::raw('count(*) as total'))
            ->with('service')
            ->groupBy('service_id')
            ->orderBy('total', 'desc')
            ->limit(5)
            ->get();

        $recentOrders = Order::with('user', 'service')->latest()->limit(10)->get();

        return view('admin.dashboard', compact('stats', 'topServices', 'recentOrders'));
    }

    // ==================== УПРАВЛЕНИЕ УСЛУГАМИ ====================
    public function services()
    {
        $services = Service::orderBy('id', 'desc')->get();
        return view('admin.services.index', compact('services'));
    }

    public function createService()
    {
        return view('admin.services.create');
    }

    public function storeService(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        $data = $request->except('image');
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9.]/', '_', $image->getClientOriginalName());
            $image->move(public_path('images/services'), $filename);
            $data['image'] = 'images/services/' . $filename;
        }

        Service::create($data);
        return redirect()->route('admin.services')->with('success', 'Услуга добавлена');
    }

    public function editService($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    public function updateService(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ];
        
        if ($request->hasFile('image')) {
            if ($service->image && file_exists(public_path($service->image))) {
                @unlink(public_path($service->image));
            }
            
            $image = $request->file('image');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9.]/', '_', $image->getClientOriginalName());
            $image->move(public_path('images/services'), $filename);
            $data['image'] = 'images/services/' . $filename;
        } else {
            $data['image'] = $service->image;
        }

        $service->update($data);
        return redirect()->route('admin.services')->with('success', 'Услуга обновлена');
    }

    public function deleteService($id)
    {
        $service = Service::findOrFail($id);
        
        if ($service->image && file_exists(public_path($service->image))) {
            @unlink(public_path($service->image));
        }
        
        $service->delete();
        return redirect()->route('admin.services')->with('success', 'Услуга удалена');
    }
    
    public function deleteServiceImage($id)
    {
        $service = Service::findOrFail($id);
        
        if ($service->image && file_exists(public_path($service->image))) {
            @unlink(public_path($service->image));
            $service->update(['image' => null]);
            return back()->with('success', 'Изображение удалено');
        }
        
        return back()->with('error', 'Изображение не найдено');
    }

    // ==================== УПРАВЛЕНИЕ ЗАЯВКАМИ ====================
    public function orders()
    {
        $orders = Order::with('user', 'service')->latest()->paginate(20);
        return view('admin.orders.index', compact('orders'));
    }

    public function showOrder($id)
    {
        $order = Order::with('user', 'service')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function updateOrderStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $request->validate(['status' => 'required|in:new,in_progress,completed,cancelled']);
        $order->update(['status' => $request->status]);
        return back()->with('success', 'Статус заявки обновлен');
    }

    // ==================== УПРАВЛЕНИЕ АКЦИЯМИ ====================
    public function promotions()
    {
        $promotions = Promotion::orderBy('id', 'desc')->get();
        return view('admin.promotions.index', compact('promotions'));
    }

    public function storePromotion(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        $data = $request->except('image');
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9.]/', '_', $image->getClientOriginalName());
            $image->move(public_path('images/promotions'), $filename);
            $data['image'] = 'images/promotions/' . $filename;
        }

        Promotion::create($data);
        return redirect()->route('admin.promotions')->with('success', 'Акция добавлена');
    }

    public function updatePromotion(Request $request, $id)
    {
        $promotion = Promotion::findOrFail($id);
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ];
        
        if ($request->hasFile('image')) {
            if ($promotion->image && file_exists(public_path($promotion->image))) {
                @unlink(public_path($promotion->image));
            }
            
            $image = $request->file('image');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9.]/', '_', $image->getClientOriginalName());
            $image->move(public_path('images/promotions'), $filename);
            $data['image'] = 'images/promotions/' . $filename;
        } else {
            $data['image'] = $promotion->image;
        }

        $promotion->update($data);
        return redirect()->route('admin.promotions')->with('success', 'Акция обновлена');
    }

    public function deletePromotion($id)
    {
        $promotion = Promotion::findOrFail($id);
        
        if ($promotion->image && file_exists(public_path($promotion->image))) {
            @unlink(public_path($promotion->image));
        }
        
        $promotion->delete();
        return redirect()->route('admin.promotions')->with('success', 'Акция удалена');
    }

    // ==================== УПРАВЛЕНИЕ НОВОСТЯМИ ====================
    public function news()
    {
        $news = News::orderBy('id', 'desc')->paginate(20);
        return view('admin.news.index', compact('news'));
    }

    public function storeNews(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        $data = $request->except('image');
        $data['is_active'] = 1;
        $data['published_at'] = now();
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9.]/', '_', $image->getClientOriginalName());
            $image->move(public_path('images/news'), $filename);
            $data['image'] = 'images/news/' . $filename;
        }

        News::create($data);
        return redirect()->route('admin.news')->with('success', 'Новость добавлена');
    }

    public function updateNews(Request $request, $id)
    {
        $news = News::findOrFail($id);
        
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ];
        
        if ($request->hasFile('image')) {
            if ($news->image && file_exists(public_path($news->image))) {
                @unlink(public_path($news->image));
            }
            
            $image = $request->file('image');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9.]/', '_', $image->getClientOriginalName());
            $image->move(public_path('images/news'), $filename);
            $data['image'] = 'images/news/' . $filename;
        } else {
            $data['image'] = $news->image;
        }

        $news->update($data);
        return redirect()->route('admin.news')->with('success', 'Новость обновлена');
    }

    public function deleteNews($id)
    {
        $news = News::findOrFail($id);
        
        if ($news->image && file_exists(public_path($news->image))) {
            @unlink(public_path($news->image));
        }
        
        $news->delete();
        return redirect()->route('admin.news')->with('success', 'Новость удалена');
    }

    // ==================== УПРАВЛЕНИЕ ОТЗЫВАМИ ====================
    public function reviews()
    {
        $reviews = Review::with('user')->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.reviews.index', compact('reviews'));
    }

    public function approveReview($id)
    {
        $review = Review::findOrFail($id);
        $review->update(['is_approved' => true]);
        return back()->with('success', 'Отзыв одобрен');
    }

    public function deleteReview($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return back()->with('success', 'Отзыв удален');
    }

    // ==================== УПРАВЛЕНИЕ СТАТЬЯМИ ====================
    public function createArticle()
    {
        return view('admin.articles.create');
    }

    public function articles()
    {
        $articles = Article::orderBy('id', 'desc')->paginate(20);
        return view('admin.articles.index', compact('articles'));
    }

    public function storeArticle(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        $data = $request->except('image');
        $data['is_active'] = 1;
        $data['published_at'] = now();
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9.]/', '_', $image->getClientOriginalName());
            $image->move(public_path('images/articles'), $filename);
            $data['image'] = 'images/articles/' . $filename;
        }

        Article::create($data);
        return redirect()->route('admin.articles')->with('success', 'Статья добавлена');
    }

    public function editArticle($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.articles.edit', compact('article'));
    }

    public function updateArticle(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ];
        
        if ($request->hasFile('image')) {
            if ($article->image && file_exists(public_path($article->image))) {
                @unlink(public_path($article->image));
            }
            
            $image = $request->file('image');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9.]/', '_', $image->getClientOriginalName());
            $image->move(public_path('images/articles'), $filename);
            $data['image'] = 'images/articles/' . $filename;
        } else {
            $data['image'] = $article->image;
        }

        $article->update($data);
        return redirect()->route('admin.articles')->with('success', 'Статья обновлена');
    }

    public function deleteArticle($id)
    {
        $article = Article::findOrFail($id);
        
        if ($article->image && file_exists(public_path($article->image))) {
            @unlink(public_path($article->image));
        }
        
        $article->delete();
        return redirect()->route('admin.articles')->with('success', 'Статья удалена');
    }
}