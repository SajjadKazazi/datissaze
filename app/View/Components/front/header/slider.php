<?php

namespace App\View\Components\front\header;

use App\Repositories\Front\SliderRepositoryEloquent;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class slider extends Component
{
    public $sliders;

    public function __construct(SliderRepositoryEloquent $sliders)
    {
        if (Cache::has('sliders_cache')) {
            $this->sliders = Cache::get('sliders_cache');
        } else {
            Cache::rememberForever('sliders_cache', function () use($sliders) {
                $this->sliders = $sliders->orderBy('order')->findWhere(['visibility' => 1], ['id', 'img','action','title']);
                return $this->sliders;
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
        return view('components.front.header.slider');
    }
}
