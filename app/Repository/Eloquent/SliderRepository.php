<?php

namespace App\Repository\Eloquent;

use App\Models\Slider;
use App\Repository\SliderRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class SliderRepository extends BaseRepository implements SliderRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param User $model
     */
    public function __construct(Slider $model)
    {
        $this->model = $model;
    }
}
