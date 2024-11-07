<?php

namespace App\Http\Controllers;

use App\Models\Article;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $featureArticle = Article::Published()->featured()->latest('published_at')->take(3)->get();
        $latestArticle = Article::Published()->latest('published_at')->take(9)->get();
        return view('home', [
            'featureArticle' => $featureArticle,
            'latestArticle' => $latestArticle,
        ]);
    }
}
