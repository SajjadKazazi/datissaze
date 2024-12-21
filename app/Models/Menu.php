<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;

class Menu extends Model
{
    use HasFactory;

    public function update(array $attributes = [], array $options = [])
    {
        $result =  parent::update($attributes, $options);
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');

        return $result ;

    }


    protected $fillable = ['parent_id', 'title', 'url', 'type', '_blank', 'visibility', 'image', 'order', 'svg'];

    public function parent(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(self::class, 'id', 'parent_id')->orderBy('order');
    }

    public function children(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(self::class, 'parent_id', 'id')->orderBy('order');
    }

    public static function tree(): \Illuminate\Database\Eloquent\Collection|array
    {
        return static::with(implode('.', array_fill(0, 100, 'children')))->where('parent_id', '=', 0)->orderBy('order')->get();
    }
}
