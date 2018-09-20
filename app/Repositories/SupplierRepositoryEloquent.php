<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\SupplierRepository;
use App\Entities\Supplier;
use App\Validators\SupplierValidator;

/**
 * Class SupplierRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SupplierRepositoryEloquent extends BaseRepository implements SupplierRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Supplier::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
