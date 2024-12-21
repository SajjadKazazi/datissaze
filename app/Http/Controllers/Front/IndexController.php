<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Support\Settings\CommunicationSettings;
use App\Support\Settings\GeneralSettings;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $settings = null ;
        if (Cache::has('general_settings_cache')) {
            $settings = Cache::get('general_settings_cache');
        } else {
            Cache::rememberForever('general_settings_cache', function () use ($settings) {
                return new GeneralSettings();
            });
        }
        $settings = Cache::get('general_settings_cache');

        SEOMeta::setTitle($settings->site_name);
        SEOMeta::setDescription($settings->site_description);

        SEOTools::setTitle($settings->site_name);
        SEOTools::setDescription($settings->site_description);
        OpenGraph::setDescription($settings->site_description);
        OpenGraph::setTitle($settings->site_name);
        OpenGraph::setUrl(url()->current());
        return view('front.index');
    }
}
