<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\SupplierCreateRequest;
use App\Http\Requests\SupplierUpdateRequest;
use App\Repositories\SupplierRepository;
use App\Validators\SupplierValidator;

/**
 * Class SuppliersController.
 *
 * @package namespace App\Http\Controllers;
 */
class SuppliersController extends Controller
{
    /**
     * @var SupplierRepository
     */
    protected $repository;

    /**
     * SuppliersController constructor.
     *
     * @param SupplierRepository $repository
     */
    public function __construct(SupplierRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $suppliers = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $suppliers,
            ]);
        }

        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SupplierCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(SupplierCreateRequest $request)
    {
            $supplier = $this->repository->create($request->validated());
            $response = [
                'message' => 'Supplier created.',
                'data'    => $supplier->toArray(),
            ];
            if ($request->wantsJson()) {
                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
    }

    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $supplier,
            ]);
        }

        return view('suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = $this->repository->find($id);

        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SupplierUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(SupplierUpdateRequest $request, $id)
    {
            $supplier = $this->repository->update($request->validated(), $id);

            $response = [
                'message' => 'Supplier updated.',
                'data'    => $supplier->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Supplier deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Supplier deleted.');
    }
}
