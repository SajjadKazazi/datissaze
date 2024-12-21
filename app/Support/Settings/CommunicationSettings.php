<?php

namespace App\Support\Settings;

use Spatie\LaravelSettings\Settings;

class CommunicationSettings extends Settings
{

    public ?string $address;
    public ?string $tel;
    public ?string $postal_code;
    public ?string $mobile;
    public ?string $email;
    public ?string $telegram;
    public ?string $facebook;
    public ?string $instagram;
    public ?string $whatsapp;
    public ?string $bale;

    public static function group(): string
    {
        return 'Communication';
    }
}
