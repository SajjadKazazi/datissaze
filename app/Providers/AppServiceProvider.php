<?php

namespace App\Providers;

use App\Support\Settings\CommunicationSettings;
use App\Support\Settings\GeneralSettings;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RepositoryServiceProvider::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        View::composer('admin.layouts.admin', function ($view) {
            $settings = new GeneralSettings();

            $view->with('settings', $settings);
        });
        View::composer('components.front.header.nav', function ($view) {
            $settings = null;
            if (Cache::has('general_settings_cache') && Cache::has('communication_settings_cache') ) {
                $settings = Cache::get('general_settings_cache');
                $communication_settings = Cache::get('communication_settings_cache');
            } else {
                Cache::rememberForever('general_settings_cache', function () use ($settings) {
                    return new GeneralSettings();

                });
                Cache::rememberForever('communication_settings_cache', function () use ($settings) {
                    return new CommunicationSettings();
                });
            }
            $settings = Cache::get('general_settings_cache');
            $communication_settings = Cache::get('communication_settings_cache');
            $view->with('settings', $settings)
                  ->with('communication_settings', $communication_settings );

        });
        View::composer('front.layouts.main', function ($view) {
            $settings = null;
            if (Cache::has('general_settings_cache') && Cache::has('communication_settings_cache') ) {
                $settings = Cache::get('general_settings_cache');
                $communication_settings = Cache::get('communication_settings_cache');
            } else {
                Cache::rememberForever('general_settings_cache', function () use ($settings) {
                    return new GeneralSettings();

                });
                Cache::rememberForever('communication_settings_cache', function () use ($settings) {
                    return new CommunicationSettings();
                });
            }
            $settings = Cache::get('general_settings_cache');
            $communication_settings = Cache::get('communication_settings_cache');
            $view->with('settings', $settings)
                ->with('communication_settings', $communication_settings );

        });

    }
}
