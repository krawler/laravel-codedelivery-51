<?php

namespace CodeDelivery\Http\Controllers\Api;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Repositories\CupomRepository;

use CodeDelivery\Http\Requests;

class CupomController extends Controller
{
    private $repository;

    public function __construct(CupomRepository $repository)
    {
        $this->repository = $repository;
    }

    public function show($code)
    {
        return $this->repository->skipPresenter(false)->findByCode($code);
    }

    public function index()
    {
        $cupoms = $this->repository->paginate(5);
        return view('admin.cupoms.index', compact('cupoms'));
    }

    public function create()
    {
        return view('admin.cupoms.create');
    }

    public function store(Requests\AdminCupomRequest $request)
    {
        $data = $request->all();
        $this->repository->create($data);

        return redirect()->route('admin.cupoms.index');
    }

    public function edit($id)
    {
        $cupom= $this->repository->find($id);

        return view('admin.cupoms.edit', compact('cupom'));
    }

    public function update(Requests\AdminCupomRequest $request, $id)
    {
        $data = $request->all();
        $this->repository->update($data, $id);

        return redirect()->route('admin.cupoms.index');
    }
}
