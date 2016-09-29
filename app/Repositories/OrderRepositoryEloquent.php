<?php

namespace CodeDelivery\Repositories;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Collection;
=======
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\orderRepository;
use CodeDelivery\Models\Order;
use CodeDelivery\Validators\OrderValidator;

/**
 * Class OrderRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class OrderRepositoryEloquent extends BaseRepository implements OrderRepository
{
<<<<<<< HEAD

    public function getByIdAndDeliveryman($id, $idDeliveryman){

        $result = $this->with('items','client')->findWhere(['id' => $id, 'user_deliveryman_id' => $idDeliveryman]);

        if($result instanceof Collection){
            $result = $result->first();
            //$result->items->each(function($item){
           //    $item->product;
          //  });
        }
        return $result;
    }

=======
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Order::class;
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
        return \CodeDelivery\Presenters\OrderPresenter::class;
    }
=======
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f
}
