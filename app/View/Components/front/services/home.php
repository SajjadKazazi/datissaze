<?php

namespace App\View\Components\front\services;

use App\Repositories\Front\PortfolioRepositoryEloquent;
use App\Repositories\Front\ServiceRepositoryEloquent;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class home extends Component
{
    public $services;

    public function __construct(ServiceRepositoryEloquent $services)
    {

        if (Cache::has('services_cache')) {
            $this->services = Cache::get('services_cache');
        } else {
            Cache::rememberForever('services_cache', function () use ($services) {
                $this->services = $services->orderBy('created_at')->findWhere(['active' => 1, 'is_home' => 1 ], ['id', 'image', 'title', 'slug'])->take(4);
//                $services = $this->serviceRepository->findWhere(['active'=>true])->all();
                return $this->services;
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
        return view('components.front.services.home');
    }
}
