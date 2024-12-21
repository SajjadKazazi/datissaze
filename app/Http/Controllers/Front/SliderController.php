<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\Front\SliderRepositoryEloquent;
use App\Repository\Eloquent\SliderRepository;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    private $sliderRepository;

    public function __construct(SliderRepositoryEloquent $sliderRepository)
    {

        $this->sliderRepository = $sliderRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {

    }

}
