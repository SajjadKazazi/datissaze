<?php

namespace App\Repository\Eloquent;

use App\Models\News;
use App\Repository\ArticleRepositoryInterface;
use App\Repository\NewsRepositoryInterface;
use App\Repository\PortfolioRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class NewsRepository extends BaseRepository implements NewsRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param News $model
     */
    public function __construct(News $model)
    {
        $this->model = $model;
    }
}
