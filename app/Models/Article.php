<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', Carbon::now());
    }
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    protected  $casts =
    [
        'published_at' => 'datetime',
    ];
    public function getExcerpt(){
        return Str::limit(strip_tags($this->content),150);
    }
    public function getReadTime(){
        return round(str_word_count($this->content)/100);
    }
}
