<?php

namespace App\View\Components\front\header;

use App\Repositories\Front\MenuRepositoryEloquent;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class nav extends Component
{
    public $menus;

    public function __construct(MenuRepositoryEloquent $menus)
    {

        if (Cache::has('menus_cache')) {
            $this->menus = Cache::get('menus_cache');
        } else {
            Cache::rememberForever('menus_cache', function () use($menus) {
                $this->menus = $menus->with(['children'=>function($child){
                    $child->with('children');
                }])->orderBy('order')->findWhere(['parent_id'=>0,'visibility'=>1,'type'=>'HEADER']);
                return $this->menus;
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
        return view('components.front.header.nav');
    }
}
