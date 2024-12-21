<?php

namespace App\View\Components\front\projects;

use App\Repositories\Front\PortfolioRepositoryEloquent;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class home extends Component
{
    public $projects;

    public function __construct(PortfolioRepositoryEloquent $portfolios)
    {

        if (Cache::has('projects_cache')) {
            $this->projects = Cache::get('projects_cache');
        } else {
            Cache::rememberForever('projects_cache', function () use ($portfolios) {
                $this->projects = $portfolios->orderBy('order')->findWhere(['active' => 1], ['id', 'thumbnail', 'title','slug','category'])->take(8);
                return $this->projects;
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
        return view('components.front.projects.home');
    }
}
