<?php

namespace App\Http\Controllers;

use App\BusinessLayer\ArticleBusinessLayer;
use App\Models\Article;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Request $request): View
    {
        $articles = Article::with(['user', 'category'])
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();
        return view('frontend.pages.home', compact('articles'));
    }
}
