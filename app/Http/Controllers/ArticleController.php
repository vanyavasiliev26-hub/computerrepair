<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::where('is_active', true)
            ->orderBy('published_at', 'desc')
            ->paginate(9);
        
        return view('articles.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::where('is_active', true)->findOrFail($id);
        
        $relatedArticles = Article::where('id', '!=', $article->id)
            ->where('is_active', true)
            ->limit(3)
            ->get();
        
        return view('articles.show', compact('article', 'relatedArticles'));
    }
}