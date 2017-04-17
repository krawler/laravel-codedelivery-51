<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;

class OrdersController extends Controller
{
    private $repository;

    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $orders = $this->repository->paginate(5);
        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        return view('admin.orders.create');
    }

    public function store(Requests\OrderRequest $request)
    {
        $data = $request->all();
        
        $this->repository->create($data);

        return redirect()->route('admin.orders.index');
    }

    public function edit($id, UserRepository $userRepository)
    {
        $order = $this->repository->find($id);
        $list_status = [0 => 'Pendente', 1 => 'A caminho', 2 => 'entregue'];
        $deliveryman = $userRepository->getDeliverymen();
        return view('admin.orders.edit', compact('order', 'list_status', 'deliveryman'));
    }

    public function update(Requests\OrderRequest $request, $id)
    {
        $data = $request->all();
        $this->repository->update($data, $id);

        return redirect()->route('admin.orders.index');
    }
}
