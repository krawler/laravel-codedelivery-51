<?php

namespace CodeDelivery\Transformers;

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
    public function transform(UserPresenter $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
