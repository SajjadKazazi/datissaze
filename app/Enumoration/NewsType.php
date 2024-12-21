<?php


namespace App\Enumoration;


class NewsType
{
//    const LESSON = 'LESSON';
    const ARTICLE  =  'ARTICLE';
    const NEWS = 'NEWS';



    const types = [
//        'LESSON' => self::LESSON,
        'ARTICLE'  => self::ARTICLE,
        'NEWS' => self::NEWS,


    ];


    const persian = [
        self::ARTICLE => 'مقاله',
        self::NEWS => 'خبر',

    ];

}
