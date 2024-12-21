<?php

namespace App\Http\Controllers\Front;

use App\Enumoration\NewsType;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\Front\CategoryNewsRepositoryEloquent;
use App\Repositories\Front\NewsRepositoryEloquent;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;

class ArticleController extends Controller
{
    private $newsRepository, $categoryRepository;

    public function __construct(NewsRepositoryEloquent $newsRepository, CategoryNewsRepositoryEloquent $categoryRepository)
    {
        $this->newsRepository = $newsRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $category_id = request()->category_id;

        $category_get = null;

        if(isset($category_id)  && $category_id !== 'all'){
            $category_get = Category::query()->where('id', $category_id)->first();

            $articles = $this->newsRepository->where('type',NewsType::ARTICLE)->whereHas('categories',function($categories) use ($category_id){
                $categories->where('category_id',$category_id);
            })->orderBy('created_at','DESC')->paginate(10, ['id', 'title', 'slug', 'created_at', 'description', 'thumbnail']);

        }
        else{
            $articles = $this->newsRepository->where('type',NewsType::ARTICLE)->orderBy('created_at','DESC')->paginate(10, ['id', 'title', 'slug', 'created_at', 'description', 'thumbnail']);

        }

        $categories = $this->categoryRepository->orderBy('created_at','DESC')->findWhere(['type' => 'article'],['id','title','slug']);
        SEOMeta::setTitle('مقالات');
        SEOMeta::setDescription('مقالات');
        SEOTools::setTitle('مقالات');
        SEOTools::setDescription('مقالات');
        OpenGraph::setDescription('مقالات');
        OpenGraph::setTitle('مقالات');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'business:articles');

        return view('front.articles.index', compact('articles', 'categories','category_get'));
    }

    public function get($slug)
    {
        $news = $this->newsRepository->with(['categories', 'meta'])->findWhere(['slug' => $slug, 'active' => 1 ,'type' => NewsType::ARTICLE])->first();
        if (!is_null($news)) {
            $meta = !is_null($news->meta) ? $news->meta : null;
            SEOMeta::setTitle(!is_null($meta) ? $meta->meta_title : $news->title);
            SEOMeta::setDescription(!is_null($meta) ? $meta->meta_description : '');
            SEOMeta::setCanonical(!is_null($meta) ? $meta->meta_canonical : '');
            SEOTools::setTitle(!is_null($meta) ? $meta->meta_title : $news->title);
            SEOTools::setDescription(!is_null($meta) ? $meta->meta_description : '');
            OpenGraph::setDescription(!is_null($meta) ? $meta->meta_description : '');
            OpenGraph::setTitle(!is_null($meta) ? $meta->meta_title : $news->title);
            OpenGraph::setUrl(url()->current());
            OpenGraph::addProperty('type', 'business:news');
            return view('front.articles.single', compact('news'));
        }
        return abort(404);

    }
}
