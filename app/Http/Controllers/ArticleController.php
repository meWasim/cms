<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        return view('articles.index',[
            'articles' => Article::take(5)->get(),
        ]);
    }
}
