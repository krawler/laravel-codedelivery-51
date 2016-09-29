<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class OrderItem extends Model implements Transformable
{
    use TransformableTrait;

    protected  $fillable = [
        'order_id',
<<<<<<< HEAD
        'product_id',
=======
        'product',
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f
        'price',
        'qtde',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
