<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Page\AddPageRequest;
use App\Http\Requests\Page\UpdatePageRequest;
use App\Models\Meta;
use App\Models\News;
use App\Models\Page;
use App\Repositories\Admin\PageRepositoryEloquent;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class PageController extends Controller
{
    private $page;

    public function __construct(PageRepositoryEloquent $page)
    {
        $this->page = $page;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $pages = $this->page->orderBy('created_at', 'DESC')->paginate(15);

        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.pages.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AddPageRequest $request): \Illuminate\Http\RedirectResponse
    {
        $slug = SlugService::createSlug(Page::class, 'slug', $request->get('slug'), ['unique' => false]);

        $payload = [
            'title' => $request->get('title'),
            'description' => $request->get('description'),

            'slug' => $slug,
            'body' => $request->get('body')
        ];

        $page = $this->page->create($payload);

        $meta = new Meta;
        $meta->meta_title =$request->get('meta_title');
        $meta->meta_description =$request->get('meta_description');
        $meta->meta_canonical =$request->get('meta_canonical');
        $page->meta()->save($meta);
        return redirect()->route('admin.pages.index')->with('success_add', __('entities/page.success.add'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Page $page): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePageRequest $request, Page $page): \Illuminate\Http\RedirectResponse
    {
        $slug = SlugService::createSlug(Page::class, 'slug', $request->get('slug'), ['unique' => false]);

        $payload = [
            'title' => $request->get('title'),
            'description' => $request->get('description'),

            'slug' => $slug,
            'body' => $request->get('body')
        ];

        $page->update($payload);
        $page->meta()->updateOrCreate([],[
            'meta_title'=>$request->get('meta_title'),
            'meta_description'=>$request->get('meta_description'),
            'meta_canonical'=>$request->get('meta_canonical'),
        ]);
        return redirect()->route('admin.pages.index')->with('success_add', __('entities/page.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        return response()->json(['success' => true, 'success_msg' => __('entities/page.success.delete')]);
    }
}
