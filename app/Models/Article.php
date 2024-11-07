<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'image',
        'title',
        'slug',
        'content',
        'published_at',
        'featured',
    ];



    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_article');
    }
    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', Carbon::now()->addDay());
    }
    public function scopeWithCategory($query, string $category)
    {
        $query->whereHas('categories',function($query)use ($category){
            $query->where('slug', $category);
        });
    }
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }
    protected  $casts =
    [
        'published_at' => 'datetime',
    ];
    public function getExcerpt()
    {
        return Str::limit(strip_tags($this->content), 150);
    }
    public function getReadTime()
    {
        return round(str_word_count($this->content) / 100);
    }
    public function getThumbnailUrl()
    {
        $isUrl = str_contains($this->image, 'http');

        return ($isUrl) ? $this->image : Storage::disk('public')->url($this->image);
    }
}
