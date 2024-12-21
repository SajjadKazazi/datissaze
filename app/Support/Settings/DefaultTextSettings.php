<?php

namespace App\Support\Settings;

use Spatie\LaravelSettings\Settings;

class DefaultTextSettings extends Settings
{

    public string $services_text;
    public string $projects_text;
    public string $pages_text;

    public static function group(): string
    {
        return 'DefaultText';
    }
}
