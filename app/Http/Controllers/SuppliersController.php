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
     * @var SupplierValidator
     */
    protected $validator;

    /**
     * SuppliersController constructor.
     *
     * @param SupplierRepository $repository
     * @param SupplierValidator $validator
     */
    public function __construct(SupplierRepository $repository, SupplierValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
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
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $supplier = $this->repository->create($request->all());

            $response = [
                'message' => 'Supplier created.',
                'data'    => $supplier->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
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
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $supplier = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Supplier updated.',
                'data'    => $supplier->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
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
