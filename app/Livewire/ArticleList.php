<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;

class ArticleList extends Component
{
    use WithPagination;
    #[Url()]
    public $sort = 'desc';
    public $search = '';
    public function setSort($sort)
    {
        $this->sort = ($sort === 'desc') ? 'desc' : 'asc';
    }
    #[On('search')]
    public function updateSearch($search)
    {
        $this->search = $search;
    }

    #[Computed()]
    public function articles()
    {
        return Article::published()->orderBy('published_at', $this->sort)->where('title','like',"%{$this->search}%")->paginate(5);
    }
    public function render()
    {
        return view('livewire.article-list');
    }
}
