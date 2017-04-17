<?php

namespace CodeDelivery\Transformers;

use CodeDelivery\Models\User;
use League\Fractal\TransformerAbstract;
use CodeDelivery\models\UserPresenter;

/**
 * Class UserPresenterTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class UserTransformer extends TransformerAbstract
{

    /**
     * Transform the \UserPresenter entity
     * @param \UserPresenter $model
     *
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id'         => (int) $model->id,
            'client'     => $model->client(),
            'name'       => $model->name,
            'email'      => $model->email,


            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
