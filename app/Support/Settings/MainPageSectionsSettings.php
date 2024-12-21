<?php

namespace App\Support\Settings;

use Spatie\LaravelSettings\Settings;

class MainPageSectionsSettings extends Settings
{

    public string $nav;
    public string $slider;
    public string $about;
    public string $service;
    public string $project;
    public string $cooperators;
    public string $team;
    public string $footer;

    public static function group(): string
    {
        return 'mainPage';
    }
}
