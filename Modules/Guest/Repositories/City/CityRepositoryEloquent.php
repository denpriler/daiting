<?php

namespace Modules\Guest\Repositories\City;

use App\Criteria\OrderByRawCriteria;
use Illuminate\Container\Container as Application;
use Modules\Guest\Entities\City;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class CityRepositoryEloquent.
 *
 * @package namespace App\Repositories\Modules\Guest;
 */
class CityRepositoryEloquent extends BaseRepository implements CityRepository
{
    use CacheableRepository;

    public function __construct(Application $app)
    {
        $this->fieldSearchable['title->' . \App::getLocale()] = 'like';
        parent::__construct($app);
    }

    protected $fieldSearchable = [];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return City::class;
    }


    /**
     * Boot up the repository, pushing criteria
     * @throws RepositoryException
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
        $this->orderBy('title->' . \App::getLocale());
    }

}
