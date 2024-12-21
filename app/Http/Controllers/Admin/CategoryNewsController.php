<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\AddPageRequest;
use App\Http\Requests\News\Category\AddNewCategoryRequest;
use App\Http\Requests\News\Category\UpdateNewsCategoryRequest;
use App\Models\Category;
use App\Models\Portfolio;
use App\Repositories\Admin\CategoryNewsRepositoryEloquent;
use App\Repository\CategoryNewsRepositoryInterface;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class CategoryNewsController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryNewsRepositoryEloquent $categoryRepository)
    {

        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryRepository->orderBy('created_at','DESC')->findWhere(['type' => 'news']);

        return view('admin.news.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AddNewCategoryRequest $request): \Illuminate\Http\RedirectResponse
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->get('slug'), ['unique' => false]);

        $payload = [
            'title' => $request->get('title'),
            'slug' => $slug,
            'type' => 'news'
        ];
        $this->categoryRepository->create($payload);

        return redirect()->route('admin.news.categories.index')->with('success_add', __('entities/category.success.add'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateNewsCategoryRequest $request, Category $category): \Illuminate\Http\RedirectResponse
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->get('slug'), ['unique' => false]);

        $payload = [
            'title' => $request->get('title'),
            'slug' => $slug
        ];
        $category->update($payload);
        return redirect()->route('admin.news.categories.index')->with('success_add', __('entities/category.success.update'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Category $category): \Illuminate\Http\JsonResponse
    {
        $category->delete();
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        return response()->json(['success' => true, 'success_msg' => __('entities/category.success.delete')]);
    }
}
