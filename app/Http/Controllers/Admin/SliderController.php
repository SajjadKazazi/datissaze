<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Slider\AddSliderRequest;
use App\Http\Requests\Slider\UpdateSliderRequest;
use App\Models\Slider;
use App\Repositories\Admin\SliderRepositoryEloquent;
use App\Repository\Eloquent\SliderRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

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
        $sliders = $this->sliderRepository->orderBy('created_at','DESC')->paginate(15);

        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('admin.sliders.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AddSliderRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AddSliderRequest $request): \Illuminate\Http\RedirectResponse
    {

        $payload = [
            'img' => $request->get('img'),
            'visibility' => $request->get('visibility'),
            'order' => $request->get('order'),
            'action' => $request->get('action'),
            'title' => $request->get('title')
        ];
        $this->sliderRepository->create($payload);
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        return redirect()->route('admin.sliders.index')->with('success_add', __('entities/slider.success.add'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateSliderRequest $request, Slider $slider): \Illuminate\Http\RedirectResponse
    {
        $image_file = $request->get('img');


        if (!is_null($image_file)) {
            $image = $image_file;
        }
        else{
            $image = $slider->img;
        }

        $payload = [
            'img' => $image ,
            'visibility' => $request->get('visibility'),
            'order' => $request->get('order'),
            'action' => $request->get('action'),
            'title' => $request->get('title')

        ];

        $slider->update($payload);

        return redirect()->route('admin.sliders.index')->with('success_add', __('entities/slider.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Slider $slider): \Illuminate\Http\JsonResponse
    {
        $slider->delete();
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        return response()->json(['success' => true, 'success_msg' => __('entities/slider.success.delete')]);
    }
}
