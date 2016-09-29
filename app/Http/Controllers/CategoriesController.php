<?php

namespace CodeDelivery\Http\Controllers;

<<<<<<< HEAD
use CodeDelivery\Http\Controllers\Controller;
=======
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f
use CodeDelivery\Repositories\CategoryRepository;
use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;

class CategoriesController extends Controller
{
    private $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $categories = $this->repository->paginate(5);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Requests\AdminCategoryRequest $request)
    {
        $data = $request->all();
        $this->repository->create($data);

        return redirect()->route('admin.categories.index');
    }

    public function edit($id)
    {
        $category = $this->repository->find($id);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(Requests\AdminCategoryRequest $request, $id)
    {
        $data = $request->all();
        $this->repository->update($data, $id);

        return redirect()->route('admin.categories.index');
    }
}
