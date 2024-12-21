<?php


namespace App\Enumoration;


class MenuType
{
//    const LESSON = 'LESSON';
    const HEADER  =  'HEADER';
    const FOOTER = 'FOOTER';



    const types = [
//        'LESSON' => self::LESSON,
        'HEADER'  => self::HEADER,
        'FOOTER' => self::FOOTER,


    ];


    const persian = [
        self::HEADER => 'هدر',
        self::FOOTER => 'فوتر',

    ];

}
