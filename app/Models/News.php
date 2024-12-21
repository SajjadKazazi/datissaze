<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
class News extends Model implements Searchable
{
    use HasFactory;

    public $guarded = [];

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
        $url = route('front.single.news', $this->slug);

        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->title,
            $url

        );
    }

    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_news', 'news_id', 'category_id');
    }

    public function meta(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Meta::class, 'metaable');
    }

}
