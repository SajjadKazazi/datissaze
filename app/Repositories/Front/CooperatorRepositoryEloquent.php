<?php

namespace App\Repositories\Front;

use App\Models\Cooperator;
use App\Models\News;
use App\Models\Portfolio;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Admin\PortfolioRepository;

/**
 * Class PortfolioRepositoryEloquent.
 *
 * @package namespace App\Repositories\\Admin;
 */
class CooperatorRepositoryEloquent extends BaseRepository implements CooperatorRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Cooperator::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}