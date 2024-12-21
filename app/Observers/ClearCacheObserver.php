<?php

namespace App\Observers;

use Illuminate\Support\Facades\Artisan;

class ClearCacheObserver
{


     public function created()
     {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
    }



    public function updated()
    {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
    }


}
