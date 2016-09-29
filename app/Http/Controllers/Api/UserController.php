<?php

namespace CodeDelivery\Http\Controllers\Api;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Repositories\CupomRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;

class UserController extends Controller
{
    protected $skipPresenter = true;
    /**
     * @var ProductRepository
     */
    private $repository;

    public function __construct(CupomRepository $repository)
    {

        $this->repository = $repository;
    }

    public function authenticated()
    {
        $id = Authorizer::getResourceOwnerId();
        return $this->repository->skipPresenter(false)->find($id);
    }

}
