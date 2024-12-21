<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\Front\PortfolioRepositoryEloquent;
use App\Repositories\Front\StaffCategoryRepositoryEloquent;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class StaffCategoryController extends Controller
{
    private $staffsCategoryRepository;

    public function __construct(StaffCategoryRepositoryEloquent $staffsCategoryRepository)
    {
        $this->staffCategoryRepository = $staffsCategoryRepository;
    }

    public function get($slug)
    {
        $category = $this->staffCategoryRepository->findWhere(['slug' => $slug],['id','description','title'])->first();
        SEOMeta::setTitle(!is_null($category) ? $category->title : '');
        SEOMeta::setDescription(!is_null($category) ? $category->title : '');
        SEOMeta::setCanonical(!is_null($category) ? $category->title : '');
        SEOTools::setTitle(!is_null($category) ? $category->title : '');
        SEOTools::setDescription(!is_null($category) ? $category->title : '');
        OpenGraph::setDescription(!is_null($category) ? $category->title : '');
        OpenGraph::setTitle(!is_null($category) ? $category->title : '');
        OpenGraph::setUrl(url()->current());

        OpenGraph::addProperty('type', 'business:staff');

        $staffs =$category->staffs()->paginate(10,['name','job','avatar']);
        return view('front.teams.categories.index', compact('staffs','category'));


    }
}
