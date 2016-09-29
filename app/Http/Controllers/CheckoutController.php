<?php

namespace CodeDelivery\Http\Controllers;

<<<<<<< HEAD
use CodeDelivery\Http\Controllers\Auth\AuthController;
use CodeDelivery\Models\Client;
=======
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f
use CodeDelivery\Repositories\CategoryRepository;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\UserRepository;
<<<<<<< HEAD
use CodeDelivery\Services\OrderService;
use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use Illuminate\Support\Facades\Auth;
=======
use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f

class CheckoutController extends Controller
{
    private $orderRepository;
    private $userRepository;
    private $productRepository;
<<<<<<< HEAD
    private $orderService;

    public function __construct(OrderRepository $orderRepository,
                                UserRepository $userRepository,
                                ProductRepository $productRepository,
                                OrderService $orderService)
=======

    public function __construct(OrderRepository $orderRepository,
                                UserRepository $userRepository,
                                ProductRepository $productRepository)
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f
    {
        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
<<<<<<< HEAD
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

=======
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f
    }

    public function create()
    {
        $products = $this->productRepository->lists('name','id');
<<<<<<< HEAD
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

=======
        return view('customer.order.create', compact('products'));
    }
    
    
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f


}
