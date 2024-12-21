<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $table ='staffs';
    protected $guarded = [];


    public function meta(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Meta::class, 'metaable');
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(StaffCategory::class);
    }
}
