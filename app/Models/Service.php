<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Service extends Model implements Searchable
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

    public function getSearchResult(): SearchResult
    {
        $url = route('front.single.services', $this->slug);

        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->title,
            $url
        );
    }

    public function meta(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Meta::class, 'metaable');
    }
}
