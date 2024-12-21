<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateMainPageSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('mainPage.site_name', 'Spatie');
        $this->migrator->add('mainPage.site_description', 'Spatie');
    }
}
