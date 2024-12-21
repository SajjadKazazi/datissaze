<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;

class Cooperator extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function update(array $attributes = [], array $options = [])
    {
        $result =  parent::update($attributes, $options);
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');

        return $result ;

    }


    public function meta(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Meta::class, 'metaable');
    }
}
