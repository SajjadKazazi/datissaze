<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\AddNewsRequest;
use App\Http\Requests\News\AddPageRequest;
use App\Http\Requests\News\UpdateNewsRequest;
use App\Models\Category;
use App\Models\Meta;
use App\Models\News;
use App\Repositories\Admin\CategoryNewsRepositoryEloquent;
use App\Repositories\Admin\NewsRepositoryEloquent;
use App\Repository\Eloquent\NewsRepository;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    private $news, $category;

    public function __construct(NewsRepositoryEloquent $news, CategoryNewsRepositoryEloquent $category)
    {

        $this->news = $news;
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {

        $news = $this->news->where('type','NEWS')->with(['categories'])->orderBy('created_at', 'DESC')->paginate(15);

        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = $this->category->findWhere(['type' => 'news'], ['id', 'title']);

        return view('admin.news.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AddNewsRequest $request): \Illuminate\Http\RedirectResponse
    {
        $slug = SlugService::createSlug(News::class, 'slug', $request->get('slug'), ['unique' => false]);

        $categories = $request->get('categories');
        $payload = [
            'creator_id' => auth()->id(),
            'type'=>'NEWS',
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'body' => $request->get('body'),
            'slug' => $slug,
            'active' => $request->get('active'),
            'thumbnail' => $request->get('thumbnail'),
            'page_image' => '',
        ];
        $news = $this->news->create($payload);
        $news->categories()->attach($categories);
        $meta = new Meta;
        $meta->meta_title = $request->get('meta_title');
        $meta->meta_description = $request->get('meta_description');
        $meta->meta_canonical = $request->get('meta_canonical');
        $news->meta()->save($meta);
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');



        return redirect()->route('admin.news.index')->with('success_add', __('entities/news.success.add'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(News $news): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = $this->category->findWhere(['type' => 'news'], ['id', 'title']);
        $news_categories = $news->categories()->pluck('id')->toArray();
        return view('admin.news.edit', compact('news', 'news_categories', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateNewsRequest $request, News $news): \Illuminate\Http\RedirectResponse
    {
        $image_file = $request->get('thumbnail');
        $categories = $request->get('categories');
        if (!is_null($image_file)) {
            $image = $image_file;
        } else {
            $image = $news->thumbnail;
        }

        $slug = SlugService::createSlug(News::class, 'slug', $request->get('slug'), ['unique' => false]);

        $payload = [
            'creator_id' => auth()->id(),
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'body' => $request->get('body'),
            'slug' => $slug,
            'active' => $request->get('active'),
            'thumbnail' => $image,
            'page_image' => '',

        ];

        $news->update($payload);
        $news->categories()->sync($categories);

        $news->meta()->updateOrCreate([
            'meta_title' => $request->get('meta_title'),
            'meta_description' => $request->get('meta_description'),
            'meta_canonical' => $request->get('meta_canonical'),
        ]);
        return redirect()->route('admin.news.index')->with('success_add', __('entities/news.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(News $news): \Illuminate\Http\JsonResponse
    {
        $news->delete();
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        return response()->json(['success' => true, 'success_msg' => __('entities/news.success.delete')]);
    }
}
