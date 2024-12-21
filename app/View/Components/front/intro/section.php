<?php

namespace App\View\Components\front\intro;

use App\Support\Settings\MainPageSettings;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class section extends Component
{
    public $settings;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        if (Cache::has('intro_setting_cache')) {
            $this->settings = Cache::get('intro_setting_cache');
        } else {
            Cache::rememberForever('intro_setting_cache', function() {
                $main_site_setting = new MainPageSettings();
                $settings['site_description'] = $main_site_setting->site_description;
                $settings['site_name'] = $main_site_setting->site_name;
                $this->settings = $settings;
                return $this->settings;
            });
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        return view('components.front.intro.section');
    }
}
