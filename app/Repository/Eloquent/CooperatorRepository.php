<?php

namespace App\Repository\Eloquent;

use App\Models\Cooperator;
use App\Models\Slider;
use App\Repository\CooperatorRepositoryInterface;
use App\Repository\SliderRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class CooperatorRepository extends BaseRepository implements CooperatorRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Cooperator $model
     */
    public function __construct(Cooperator $model)
    {
        $this->model = $model;
    }
}
