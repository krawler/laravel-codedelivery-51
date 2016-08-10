<?php

namespace CodeDelivery\Http\Controllers\Api\Deliveryman;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class DeliverymanCheckoutController extends Controller
{
    private $orderRepository;
    private $userRepository;
    private $productRepository;
    private $orderService;

    public function __construct(OrderRepository $orderRepository,
                                UserRepository $userRepository,
                                ProductRepository $productRepository,
                                OrderService $orderService)
    {
        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
        $this->orderService = $orderService;
    }

    public function index()
    {
        $id = Authorizer::getResourceOwnerId();
        $orders = $this->orderRepository->with('items')->scopeQuery(function($query) use($id) {
            return $query->where('user_deliveryman_id','=',$id);
        })->paginate();

        return $orders;
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $id = Authorizer::getResourceOwnerId();
        $clientId = $this->userRepository->find($id)->client->id;
        $data['client_id'] = $clientId;
        $order = $this->orderService->create($data);
        $order = $this->orderRepository->with('items')->find($order->id);

        return $order;
    }

    public function show($id)
    {
        $idUser = Authorizer::getResourceOwnerId();
        return $this->orderRepository->getByIdAndDeliveryman($id,$idUser);
    }

    public function updateStatus(Request $request, $id)
    {
        $idUser = Authorizer::getResourceOwnerId();
        $order = $this->orderService->updateStatus($id,$idUser,$request->get('status'));

        if($order){
           return $order;
        }

        abort(400,"Order não encontrado");
    }


}
