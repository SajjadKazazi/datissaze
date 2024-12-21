<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Portfolio\AddServiceRequest;
use App\Http\Requests\Portfolio\UpdateServiceRequest;
use App\Models\Meta;
use App\Models\Page;
use App\Models\Portfolio;
use App\Models\Service;
use App\Repositories\Admin\ServiceRepositoryEloquent;
use App\Repository\Eloquent\ServiceRepository;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    private $serviceRepository;

    public function __construct(ServiceRepositoryEloquent $serviceRepository)
    {

        $this->serviceRepository = $serviceRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $services = $this->serviceRepository->orderBy('created_at','DESC')->paginate(15);

        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.services.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AddServiceRequest $request): \Illuminate\Http\RedirectResponse
    {
        $slug = SlugService::createSlug(Service::class, 'slug', $request->get('slug'), ['unique' => false]);

        $payload = [
            'title' => $request->get('title'),

            'slug' => $slug,
            'image' => $request->get('image'),
            'body' => $request->get('body'),
            'active' => $request->get('active'),
            'is_home' => $request->get('is_home'),

            'description' => $request->get('description')

        ];
        $service = $this->serviceRepository->create($payload);
        $meta = new Meta;
        $meta->meta_title =$request->get('meta_title');
        $meta->meta_description =$request->get('meta_description');
        $meta->meta_canonical =$request->get('meta_canonical');
        $service->meta()->save($meta);
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');

        return redirect()->route('admin.services.index')->with('success_add', __('entities/service.success.add'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service): \Illuminate\Http\Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Service $service): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.services.edit', compact('service'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateServiceRequest $request, Service $service): \Illuminate\Http\RedirectResponse
    {
        $slug = SlugService::createSlug(Service::class, 'slug', $request->get('slug'), ['unique' => false]);

        $image_file = $request->get('image');


        if (!is_null($image_file)) {
            $image = $image_file;
        } else {
            $image = $service->image;
        }
        $payload = [
            'title' => $request->get('title'),
            'slug' => $slug,
            'active' => $request->get('active'),
            'is_home' => $request->get('is_home'),

            'description' => $request->get('description'),
            'image' => $image ?? null,
            'body' => $request->get('body'),
        ];
        $service->update($payload);
        $service->meta()->updateOrCreate([],[
            'meta_title'=>$request->get('meta_title'),
            'meta_description'=>$request->get('meta_description'),
            'meta_canonical'=>$request->get('meta_canonical'),
        ]);
        return redirect()->route('admin.services.index')->with('success_add', __('entities/service.success.update'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Service $service): \Illuminate\Http\JsonResponse
    {
        $service->delete();
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        return response()->json(['success' => true, 'success_msg' => __('entities/service.success.delete')]);
    }

}
