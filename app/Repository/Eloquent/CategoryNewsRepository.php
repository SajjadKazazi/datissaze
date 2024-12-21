<?php

namespace App\Repository\Eloquent;

use App\Models\Category;
use App\Models\Slider;
use App\Repository\CategoryNewsRepositoryInterface;
use App\Repository\SliderRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class CategoryNewsRepository extends BaseRepository implements CategoryNewsRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Category $model
     */
    public function __construct(Category $model)
    {
        $this->model = $model;
    }
}
