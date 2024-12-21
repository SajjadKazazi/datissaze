<?php

namespace App\Repository\Eloquent;

use App\Models\Portfolio;
use App\Repository\PortfolioRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class PortfolioRepository extends BaseRepository implements PortfolioRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Portfolio $model
     */
    public function __construct(Portfolio $model)
    {
        $this->model = $model;
    }
}
