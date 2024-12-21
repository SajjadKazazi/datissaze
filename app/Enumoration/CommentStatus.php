<?php

namespace App\Enumoration;

class CommentStatus
{
    const PENDING = 'PENDING';
    const REJECT = 'REJECT';
    const ACCEPT = 'ACCEPT';


    const status = [
        'PENDING' => self::PENDING,
        'REJECT' => self::REJECT,
        'ACCEPT' => self::ACCEPT,

    ];
}
