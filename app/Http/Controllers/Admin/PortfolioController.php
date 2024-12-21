<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Portfolio\AddPortfolioRequest;
use App\Http\Requests\Portfolio\UpdatePortfolioRequest;
use App\Models\Meta;
use App\Models\Portfolio;
use App\Repositories\Admin\PortfolioRepositoryEloquent;
use App\Repository\Eloquent\PortfolioRepository;
use App\Repository\PortfolioRepositoryInterface;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    private $portfolioRepository;

    public function __construct(PortfolioRepositoryEloquent $portfolioRepository)
    {

        $this->portfolioRepository = $portfolioRepository;
    }

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {

        $portfolios = $this->portfolioRepository->orderBy('created_at','DESC')->paginate(15);

        return view('admin.portfolios.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.portfolios.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AddPortfolioRequest $request
     * @return RedirectResponse
     */
    public function store(AddPortfolioRequest $request): \Illuminate\Http\RedirectResponse
    {
        $slug = SlugService::createSlug(Portfolio::class, 'slug', $request->get('slug'), ['unique' => false]);

        $payload = [
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'category' => $request->get('category'),
            'info' => $request->get('info'),
            'url' => $request->get('url'),
            'thumbnail' => $request->get('thumbnail'),
            'banner' => $request->get('banner'),
            'active' => $request->get('active'),
            'order' => $request->get('order'),
            'slug' => $slug,
        ];

       $portfolio = $this->portfolioRepository->create($payload);

        $meta = new Meta;
        $meta->meta_title =$request->get('meta_title');
        $meta->meta_description =$request->get('meta_description');
        $meta->meta_canonical =$request->get('meta_canonical');
        $portfolio->meta()->save($meta);
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        return redirect()->route('admin.portfolios.index')->with('success_add', __('entities/project.success.add'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Portfolio $portfolio): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.portfolios.edit', compact('portfolio'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePortfolioRequest $request
     * @param Portfolio $portfolio
     * @return RedirectResponse
     */
    public function update(UpdatePortfolioRequest $request, Portfolio $portfolio): \Illuminate\Http\RedirectResponse
    {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        $image_file = $request->get('thumbnail');
        $banner_file = $request->get('banner');


        if (!is_null($image_file)) {
            $image = $image_file;
        } else {
            $image = $portfolio->thumbnail;
        }
        if (!is_null($banner_file)) {
            $banner = $banner_file;
        } else {
            $banner = $portfolio->banner;
        }

        $slug = SlugService::createSlug(Portfolio::class, 'slug', $request->get('slug'), ['unique' => false]);

        $payload = [
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'category' => $request->get('category'),
            'info' => $request->get('info'),
            'url' => $request->get('url'),
            'order' => $request->get('order'),
            'thumbnail' => $image ?? '',
            'banner' => $banner ?? '',
            'active' => $request->get('active'),
            'slug' => $slug,
        ];

        $portfolio->update($payload);
        $portfolio->meta()->updateOrCreate([],[
            'meta_title'=>$request->get('meta_title'),
            'meta_description'=>$request->get('meta_description'),
            'meta_canonical'=>$request->get('meta_canonical'),
        ]);

        return redirect()->route('admin.portfolios.index')->with('success_add', __('entities/project.success.update'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Portfolio $project
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Portfolio $portfolio): \Illuminate\Http\JsonResponse
    {
        $portfolio->delete();
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        return response()->json(['success' => true, 'success_msg' => __('entities/project.success.delete')]);
    }


}
