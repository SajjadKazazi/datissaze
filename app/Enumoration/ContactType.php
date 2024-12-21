<?php

namespace App\Enumoration;

class ContactType
{
    const COOPERATION = 'COOPERATION';
    const EDUCATION = 'EDUCATION';
    const COUNSELING = 'COUNSELING';


    const type = [
        'COOPERATION' => self::COOPERATION,
        'EDUCATION' => self::EDUCATION,
        'COUNSELING' => self::COUNSELING,

    ];

    const persian = [
        self::COOPERATION => 'درخواست همکاری',
        self::EDUCATION => 'درخواست آموزش',
        self::COUNSELING => 'درخواست مشاوره',

    ];

}
