<?php

namespace App\Repositories\Front;

use App\Models\News;
use App\Models\Portfolio;
use App\Models\Staff;
use App\Models\StaffCategory;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Admin\PortfolioRepository;

/**
 * Class PortfolioRepositoryEloquent.
 *
 * @package namespace App\Repositories\\Admin;
 */
class StaffCategoryRepositoryEloquent extends BaseRepository implements StaffCategoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return StaffCategory::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
