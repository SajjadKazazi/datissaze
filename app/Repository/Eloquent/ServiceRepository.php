<?php

namespace App\Repository\Eloquent;

use App\Models\News;
use App\Models\Service;
use App\Repository\ArticleRepositoryInterface;
use App\Repository\NewsRepositoryInterface;
use App\Repository\PortfolioRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class ServiceRepository extends BaseRepository implements NewsRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Service $model
     */
    public function __construct(Service $model)
    {
        $this->model = $model;
    }
}
