<?php

namespace App\Support\Settings;

use Spatie\LaravelSettings\Settings;

class MainPageSettings extends Settings
{

    public string $site_name;
    public string $site_description;

    public static function group(): string
    {
        return 'mainPage';
    }
}
