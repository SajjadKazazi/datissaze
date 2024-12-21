<?php

use Illuminate\Support\Facades\Artisan;

function fixPersianCharNum($string)
{
    $chars = array('ك', 'ي', 'ﯼ', 'ى');
    $fix_persian_char = array('ک', 'ی', 'ی', 'ی');
    $persian = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
    $arabic = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩‎');
    $standard = range(0, 9);
    return strtr($string, $persian);
}
function clear_cache(): void
{
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');

}
