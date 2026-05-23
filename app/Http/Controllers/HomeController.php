<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Article;
use App\Models\Service;
use App\Models\Promotion;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        $services = Service::take(4)->get();
        $reviews = Review::approved()->with('user')->latest()->limit(6)->get();
        $articles = Article::where('is_active', true)->latest()->limit(3)->get();
        $promotions = Promotion::where('is_active', true)->get(); // Убрали orderBy('sort_order')
        $news = News::where('is_active', true)->latest('published_at')->limit(4)->get();
        
        return view('welcome', compact('services', 'reviews', 'articles', 'promotions', 'news'));
    }


    public function about()
    {
        return view('about');
    }


    public function services()
    {
        $services = Service::all();
        return view('services', compact('services'));
    }


    public function reviews()
    {
        $reviews = Review::approved()->with('user')->latest()->paginate(10);
        
        $stats = [
            'average' => Review::approved()->avg('rating') ?? 0,
            'total' => Review::approved()->count(),
            '5_stars' => Review::approved()->where('rating', 5)->count(),
            '4_stars' => Review::approved()->where('rating', 4)->count(),
            '3_stars' => Review::approved()->where('rating', 3)->count(),
            '2_stars' => Review::approved()->where('rating', 2)->count(),
            '1_stars' => Review::approved()->where('rating', 1)->count(),
        ];
        
        return view('reviews', compact('reviews', 'stats'));
    }


    public function storeReview(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Авторизуйтесь, чтобы оставить отзыв');
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:5|max:1000',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'comment' => $request->comment,
            'is_approved' => false,
        ]);

        return redirect()->route('reviews')->with('success', 'Спасибо за отзыв! Он будет опубликован после проверки.');
    }


    public function contacts()
    {
        return view('contacts');
    }
}
