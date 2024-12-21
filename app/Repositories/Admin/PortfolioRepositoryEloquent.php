<?php

namespace App\Repositories\Admin;

use App\Models\Portfolio;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Admin\PortfolioRepository;

/**
 * Class PortfolioRepositoryEloquent.
 *
 * @package namespace App\Repositories\\Admin;
 */
class PortfolioRepositoryEloquent extends BaseRepository implements PortfolioRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Portfolio::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
