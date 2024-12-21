<?php

namespace App\View\Components\front\cooperators;

use App\Repositories\Front\CooperatorRepositoryEloquent;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class home extends Component
{
    public $cooperators;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(CooperatorRepositoryEloquent $cooperators)
    {
        if (Cache::has('cooperators_cache')) {
            $this->cooperators = Cache::get('cooperators_cache');
        } else {
            Cache::rememberForever('cooperators_cache', function () use ($cooperators) {
                $this->cooperators = $cooperators->orderBy('created_at', 'DESC')->get(['id','img'])->all();
                return $this->cooperators;
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
        return view('components.front.cooperators.home');
    }
}
