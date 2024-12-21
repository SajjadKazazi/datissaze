<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Portfolio;
use App\Models\Service;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Spatie\Searchable\ModelSearchAspect;
use Spatie\Searchable\Search;

class SearchController extends Controller
{
    public function search(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application

    {

        $search = $request->get('query');

        $searchResults = '';
        if (!is_null($search)) {
            $searchResults = (new Search())
                ->registerModel(Service::class, function (ModelSearchAspect $modelSearchAspect) {
                    $modelSearchAspect
                        ->where('active', 1)
                        ->addSearchableAttribute('title')
                        ->addSearchableAttribute('body')
                        ->addSearchableAttribute('description');
                })
                ->registerModel(News::class, function(ModelSearchAspect $modelSearchAspect){
                    $modelSearchAspect
                        ->where('active', 1)
                        ->addSearchableAttribute('title')
                        ->addSearchableAttribute('body')
                        ->addSearchableAttribute('description');
                })
                ->registerModel(Portfolio::class, function(ModelSearchAspect $modelSearchAspect){
                    $modelSearchAspect
                        ->where('active', 1)
                        ->addSearchableAttribute('title')
                        ->addSearchableAttribute('info')
                        ->addSearchableAttribute('slug');
                })

                ->search($search)
                ->groupByType()
                ->toArray();
        }
        SEOMeta::setTitle('نتایج جستجو : ' . $search);
        SEOMeta::setDescription('نتایج جستجو : ' . $search);
        SEOTools::setTitle('نتایج جستجو : ' . $search);
        SEOTools::setDescription('نتایج جستجو : ' . $search);
        OpenGraph::setDescription('نتایج جستجو : ' . $search);
        OpenGraph::setTitle('نتایج جستجو : ' . $search);
        OpenGraph::setUrl(url()->current());
        return view('front.search.search', compact('searchResults'));

    }
}
