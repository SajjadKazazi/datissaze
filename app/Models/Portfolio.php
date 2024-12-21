<?php

namespace App\Models;
use \Illuminate\Support\Facades\Artisan;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
    class Portfolio extends Model implements Searchable
    {
        use HasFactory,Sluggable;
        protected $guarded = [];

//        protected static function boot()
//        {
//            parent::boot();
//
//            static::created(function ($post) {
//                $post->slug = $post->createSlug($post->title);
//                $post->save();
//            });
//        }

        public function sluggable(): array
        {
            return [
                'slug' => [
                    'source' => 'slug'
                ]
            ];
        }
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
            $url = route('front.single.projects', $this->slug);

            return new \Spatie\Searchable\SearchResult(
                $this,
                $this->title,
                $this->slug,
                $url


            );
        }

        public function meta(): \Illuminate\Database\Eloquent\Relations\MorphOne
        {
            return $this->morphOne(Meta::class, 'metaable');
        }
    }
