<?php

namespace App\View\Components\front\team;

use App\Repositories\Front\PortfolioRepositoryEloquent;
use App\Repositories\Front\StaffRepositoryEloquent;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class home extends Component
{
    public $staffs;

    public function __construct(StaffRepositoryEloquent $staffs)
    {

        if (Cache::has('staffs_cache')) {
            $this->staffs = Cache::get('staffs_cache');
        } else {
            Cache::rememberForever('staffs_cache', function () use ($staffs) {
                $this->staffs = $staffs->orderBy('created_at', 'DESC')->findWhere(['active' => 1], ['id', 'avatar', 'name','job'])->take(10);
                return $this->staffs;
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
        return view('components.front.team.home');
    }
}
