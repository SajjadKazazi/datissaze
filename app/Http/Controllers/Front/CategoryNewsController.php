<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\Category\AddNewCategoryRequest;
use App\Http\Requests\News\Category\UpdateNewsCategoryRequest;
use App\Models\Category;
use \App\Repositories\Front\CategoryNewsRepositoryEloquent ;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function single($slug)
    {
        $category = $this->categoryRepository->with('news')->findWhere(['slug'=> $slug ],['id','title'])->first();

        if (!is_null($category)) {
            $meta = !is_null($category->meta) ? $category->meta : null;
            SEOMeta::setTitle(!is_null($meta) ? $meta->meta_title : $category->title);
            SEOMeta::setDescription(!is_null($meta) ? $meta->meta_description : '');
            SEOMeta::setCanonical(!is_null($meta) ? $meta->meta_canonical : '');
            SEOTools::setTitle(!is_null($meta) ? $meta->meta_title : $category->title);
            SEOTools::setDescription(!is_null($meta) ? $meta->meta_description : '');
            OpenGraph::setDescription(!is_null($meta) ? $meta->meta_description : '');
            OpenGraph::setTitle(!is_null($meta) ? $meta->meta_title : $category->title);
            OpenGraph::setUrl(url()->current());
            OpenGraph::addProperty('type', 'business:category');

            return view('front.news.category.single', compact('category'));
        }
        return abort(404);
    }

}
