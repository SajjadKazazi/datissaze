<?php

namespace App\View\Components\front\news;

use App\Repositories\Front\NewsRepositoryEloquent;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class home extends Component
{
    public $news;

    public function __construct(NewsRepositoryEloquent $news)
    {

        if (Cache::has('news_cache')) {
            $this->news = Cache::get('news_cache');
        } else {
            Cache::rememberForever('news_cache', function () use ($news) {
                $this->news = $news->orderBy('created_at', 'DESC')->findWhere(['active' => 1,'type'=>'NEWS'], ['id', 'thumbnail', 'title','description','slug','created_at'])->take(4);
                return $this->news;
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
        return view('components.front.news.home');
    }
}
