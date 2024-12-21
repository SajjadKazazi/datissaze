<?php

namespace App\View\Components\front\services;

use App\Repositories\Front\ServiceRepositoryEloquent;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class feature extends Component
{
    public $service;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ServiceRepositoryEloquent $services)
    {
        if (Cache::has('service_feature_cache')) {
            $this->service = Cache::get('service_feature_cache');
        } else {
            Cache::rememberForever('service_feature_cache', function () use ($services) {
                $this->service = $services->findWhere(['is_home'=>1], ['id', 'image', 'title','slug','description'])->first();
                return $this->service;
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
        return view('components.front.services.feature');
    }
}
