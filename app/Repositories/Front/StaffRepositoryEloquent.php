<?php

namespace App\Repositories\Front;

use App\Models\News;
use App\Models\Portfolio;
use App\Models\Staff;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Admin\PortfolioRepository;

/**
 * Class PortfolioRepositoryEloquent.
 *
 * @package namespace App\Repositories\\Admin;
 */
class StaffRepositoryEloquent extends BaseRepository implements StaffRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Staff::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
