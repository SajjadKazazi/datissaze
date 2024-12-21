<?php

namespace App\Repository\Eloquent;

use App\Models\News;
use App\Models\Staff;
use App\Repository\ArticleRepositoryInterface;
use App\Repository\NewsRepositoryInterface;
use App\Repository\PortfolioRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class StaffRepository extends BaseRepository implements NewsRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Staff $model
     */
    public function __construct(Staff $model)
    {
        $this->model = $model;
    }
}
