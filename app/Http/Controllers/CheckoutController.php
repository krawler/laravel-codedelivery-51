<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Controllers\Auth\AuthController;
use CodeDelivery\Models\Client;
use CodeDelivery\Repositories\CategoryRepository;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
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
        $cli = new Client();
        if(Auth::check()){
            $clientId = $this->userRepository->find(Auth::user()->id)->client->id;
            $orders = $this->orderRepository->scopeQuery(function($query) use($clientId) {
                return $query->where('client_id','=',$clientId);
            })->paginate();
            return view('costumer.order.index', compact('orders'));
        }else{
            return view('costumer.order.index');
        }

    }

    public function create()
    {
        $products = $this->productRepository->lists('name','id');
        return view('costumer.order.create', compact('products'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $clientId = $this->userRepository->find(Auth::user()->id)->client->id;
        $data['client_id'] = $clientId;
        $this->orderService->create($data);

        return redirect()->route('costumer.order.index');
    }



}
