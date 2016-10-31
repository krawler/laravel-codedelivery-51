<?php

namespace CodeDelivery\Presenters;

use CodeDelivery\Transformers\UserPresenterTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UserPresenterPresenter
 *
 * @package namespace CodeDelivery\Presenters;
 */
class UserPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new UserPresenterTransformer();
    }
}
