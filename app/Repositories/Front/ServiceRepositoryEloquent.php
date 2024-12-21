<?php

namespace App\Repositories\Front;

use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Slider;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Admin\PortfolioRepository;

/**
 * Class PortfolioRepositoryEloquent.
 *
 * @package namespace App\Repositories\\Admin;
 */
class ServiceRepositoryEloquent extends BaseRepository implements ServiceRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Service::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
