<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\Front\PageRepositoryEloquent;
use App\Support\Settings\DefaultTextSettings;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class PageController extends Controller
{
    private $pageRepository;

    public function __construct(PageRepositoryEloquent $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }
    public function get($slug){

        $page = $this->pageRepository->findWhere(['slug' => $slug])->first();

        if (!is_null($page)) {
            $meta = !is_null($page->meta) ? $page->meta : null;

            SEOMeta::setTitle(!is_null($meta) ? $meta->meta_title : $page->title);
            SEOMeta::setDescription(!is_null($meta) ? $meta->meta_description : '');
            SEOMeta::setCanonical(!is_null($meta) ? $meta->meta_canonical : '');
            SEOTools::setTitle(!is_null($meta) ? $meta->meta_title : $page->title);
            SEOTools::setDescription(!is_null($meta) ? $meta->meta_description : '');
            OpenGraph::setDescription(!is_null($meta) ? $meta->meta_description : '');
            OpenGraph::setTitle(!is_null($meta) ? $meta->meta_title : $page->title);
            OpenGraph::setUrl(url()->current());

            OpenGraph::addProperty('type', 'business:page');

            return view('front.pages.single', compact('page'));
        }
        return abort(404);
    }
}
