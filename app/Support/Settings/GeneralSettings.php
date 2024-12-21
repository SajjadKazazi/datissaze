<?php

namespace App\Support\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{

    public string $site_name;
    public string $site_logo;
    public string $favicon;
    public string $site_description;
    public string $page_image;
    public string $project_page_image;
    public string $service_page_image;

    public static function group(): string
    {
        return 'general';
    }
}
