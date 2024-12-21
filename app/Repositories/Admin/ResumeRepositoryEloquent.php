<?php

namespace App\Repositories\Admin;

use App\Models\Contact;
use App\Models\Cooperator;
use App\Models\News;
use App\Models\Portfolio;
use App\Models\Resume;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Admin\PortfolioRepository;

/**
 * Class PortfolioRepositoryEloquent.
 *
 * @package namespace App\Repositories\\Admin;
 */
class ResumeRepositoryEloquent extends BaseRepository implements ResumeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Resume::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
