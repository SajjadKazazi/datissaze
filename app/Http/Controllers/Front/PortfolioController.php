<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\Front\PortfolioRepositoryEloquent;
use App\Support\Settings\DefaultTextSettings;
use App\Support\Settings\GeneralSettings;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    private $projectRepository;

    public function __construct(PortfolioRepositoryEloquent $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function index()
    {
        $projects = $this->projectRepository->orderBy('order')->findWhere(['active'=>1],['id', 'title', 'thumbnail', 'slug','category']);
        SEOMeta::setTitle('پروژه های انجام شده');
        SEOMeta::setDescription('پروژه های انجام شده');
        SEOTools::setTitle('پروژه های انجام شده');
        SEOTools::setDescription('پروژه های انجام شده');
        OpenGraph::setDescription('پروژه های انجام شده');
        OpenGraph::setTitle('پروژه های انجام شده');
        OpenGraph::setUrl(url()->current());

        OpenGraph::addProperty('type', 'business:service');
        $DefaultTextSettings = new DefaultTextSettings();
        $GeneralSettings = new GeneralSettings();
        return view('front.projects.index', compact('projects', 'DefaultTextSettings','GeneralSettings'));
    }

    public function get($slug)
    {
        $project = $this->projectRepository->findWhere(['slug' => $slug])->first();

        if (!is_null($project)) {
            $meta = !is_null($project->meta) ? $project->meta : null;
            SEOMeta::setTitle(!is_null($meta) ? $meta->meta_title : $project->title);
            SEOMeta::setDescription(!is_null($meta) ? $meta->meta_description : '');
            SEOMeta::setCanonical(!is_null($meta) ? $meta->meta_canonical : '');
            SEOTools::setTitle(!is_null($meta) ? $meta->meta_title : $project->title);
            SEOTools::setDescription(!is_null($meta) ? $meta->meta_description : '');
            OpenGraph::setDescription(!is_null($meta) ? $meta->meta_description : '');
            OpenGraph::setTitle(!is_null($meta) ? $meta->meta_title : $project->title);
            OpenGraph::setUrl(url()->current());
            OpenGraph::addProperty('type', 'business:portfolio');

            return view('front.projects.single', compact('project'));
        }
        return abort(404);

    }

}
