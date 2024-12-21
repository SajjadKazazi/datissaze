<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function meta(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Meta::class, 'metaable');
    }
}
