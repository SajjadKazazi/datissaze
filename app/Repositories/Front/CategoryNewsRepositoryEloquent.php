<?php

namespace App\Repositories\Front;

use App\Models\Category;
use App\Models\Contact;
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
class CategoryNewsRepositoryEloquent extends BaseRepository implements CategoryNewsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Category::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
