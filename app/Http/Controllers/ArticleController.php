<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Category;

class ArticleController extends Controller
{
    public function index(){
        // dd(Article::take(5)->latest()->get());
        return view('articles.index',[
'categories'=>Category::whereHas('articles',function($query){
    $query->published();
})->get()

        ]);
    }
}
