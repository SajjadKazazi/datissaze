<?php

namespace App\View\Components\front\footer;

use App\Repositories\Admin\MenuRepositoryEloquent;
use App\Support\Settings\CommunicationSettings;
use App\Support\Settings\GeneralSettings;
use App\Support\Settings\MainPageSettings;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class section extends Component
{
    public $settings, $footer_menus , $main_page_settings;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(MenuRepositoryEloquent $menus)
    {
        if (Cache::has('footer_communication_cache')) {
            $this->settings = Cache::get('footer_communication_cache');
        } else {
            Cache::rememberForever('footer_communication_cache', function () {
                $main_site_setting = new CommunicationSettings();
                $site_settings = new GeneralSettings();
                $settings['address'] = $main_site_setting->address;
                $settings['tel'] = $main_site_setting->tel;
                $settings['email'] = $main_site_setting->email;
                $settings['telegram'] = $main_site_setting->telegram;
                $settings['whatsapp'] = $main_site_setting->whatsapp;
                $settings['facebook'] = $main_site_setting->facebook;
                $settings['instagram'] = $main_site_setting->instagram;
                $settings['bale'] = $main_site_setting->bale;
                $settings['site_logo'] = $site_settings->site_logo;

                $this->settings = $settings;
                return $this->settings;
            });
        }

        if (Cache::has('footer_menus_cache')) {
            $this->footer_menus = Cache::get('footer_menus_cache');
        } else {
            Cache::rememberForever('footer_menus_cache', function () use ($menus) {
                $this->footer_menus = $menus->orderBy('order')->findWhere(['parent_id' => 0, 'visibility' => 1, 'type' => 'FOOTER'],['id','parent_id','title','url']);
                return $this->footer_menus;
            });
        }

        if (Cache::has('footer_mainPage_section_cache')) {
            $this->main_page_settings = Cache::get('footer_mainPage_section_cache');
        } else {
            Cache::rememberForever('footer_mainPage_section_cache', function () {
                $main_page_settings = new MainPageSettings();
                $main_page_settings_attribute['site_description'] = $main_page_settings->site_description;
                $main_page_settings_attribute['site_name'] = $main_page_settings->site_name;


                $this->main_page_settings = $main_page_settings_attribute;
                return $this->main_page_settings;
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
        return view('components.front.footer.section');
    }
}
