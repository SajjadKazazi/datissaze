<?php

namespace App\View\Components\front\articles;

use App\Repositories\Front\NewsRepositoryEloquent;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class home extends Component
{
    public $articles;

    public function __construct(NewsRepositoryEloquent $get_articles)
    {

        if (Cache::has('articles_cache')) {
            $this->articles = Cache::get('articles_cache');
        } else {
            Cache::rememberForever('articles_cache', function () use ($get_articles) {
                $this->articles = $get_articles->orderBy('created_at', 'DESC')->findWhere(['active' => 1,'type'=>'ARTICLE'], ['id', 'thumbnail', 'title','description','slug','created_at'])->take(4);
                return $this->articles;
            });
        }

    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.front.articles.home');
    }
}
