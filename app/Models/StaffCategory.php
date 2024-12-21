<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function staffs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Staff::class,'category_id');
    }
}
