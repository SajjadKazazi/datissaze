<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\Front\PortfolioRepositoryEloquent;
use App\Repositories\Front\ServiceRepositoryEloquent;
use App\Support\Settings\DefaultTextSettings;
use App\Support\Settings\GeneralSettings;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ServiceController extends Controller
{
    private $serviceRepository;

    public function __construct(ServiceRepositoryEloquent $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }
    public function index()
    {
        $services = $this->serviceRepository->findWhere(['active'=>true])->all();
        SEOMeta::setTitle('خدمات قابل ارائه');
        SEOMeta::setDescription('خدمات قابل ارائه');
        SEOTools::setTitle('خدمات قابل ارائه');
        SEOTools::setDescription('خدمات قابل ارائه');
        OpenGraph::setDescription('خدمات قابل ارائه');
        OpenGraph::setTitle('خدمات قابل ارائه');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'business:service');
        $DefaultTextSettings =  new DefaultTextSettings();
        $GeneralSettings = new GeneralSettings();


        return view('front.services.index', compact('services','DefaultTextSettings' , 'GeneralSettings'));
    }
    public function get($slug)
    {
        $service = $this->serviceRepository->findWhere(['slug' => $slug])->first();

        if (!is_null($service)) {
            $meta = !is_null($service->meta) ? $service->meta : null;
            if (!is_null($meta)) {
                $meta = !is_null($service->meta) ? $service->meta : null;
                SEOMeta::setTitle(!is_null($meta) ? $meta->meta_title : $service->title);
                SEOMeta::setDescription(!is_null($meta) ? $meta->meta_description : '');
                SEOMeta::setCanonical(!is_null($meta) ? $meta->meta_canonical : '');
                SEOTools::setTitle(!is_null($meta) ? $meta->meta_title : $service->title);
                SEOTools::setDescription(!is_null($meta) ? $meta->meta_description : '');
                OpenGraph::setDescription(!is_null($meta) ? $meta->meta_description : '');
                OpenGraph::setTitle(!is_null($meta) ? $meta->meta_title : $service->title);
                OpenGraph::setUrl(url()->current());
                OpenGraph::addProperty('type', 'business:service');
            }
            return view('front.services.single', compact('service'));
        }
        return abort(404);

    }
}
