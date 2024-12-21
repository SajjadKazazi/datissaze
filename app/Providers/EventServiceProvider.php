<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\News;
use App\Models\Portfolio;
use App\Models\Slider;
use App\Observers\ClearCacheObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
//        Portfolio::observe(ClearCacheObserver::class);
//        News::observe(ClearCacheObserver::class);
//        Slider::observe(ClearCacheObserver::class);
//        Menu::observe(ClearCacheObserver::class);

    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
