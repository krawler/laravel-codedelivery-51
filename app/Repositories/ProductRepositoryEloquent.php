<?php

namespace CodeDelivery\Repositories;

<<<<<<< HEAD
use CodeDelivery\Presenters\ProductPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Models\Product;

=======
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Models\Product;
use CodeDelivery\Validators\ProductValidator;
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f

/**
 * Class ProductRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class ProductRepositoryEloquent extends BaseRepository implements ProductRepository
{
<<<<<<< HEAD
    public function lists($column, $key = null)
    {
        return $this->model->get(['id','name','price']);
    }
    /**
=======
    /*
    public function lists()
    {
        return $this->model()->get(['id','name','price']);
    }
    */
      /**
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Product::class;
    }

<<<<<<< HEAD
=======
    

>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f
    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
<<<<<<< HEAD

    public function presenter()
    {
        return ProductPresenter::class;
    }
=======
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f
}
