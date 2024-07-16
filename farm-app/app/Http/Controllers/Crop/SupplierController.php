<?php

namespace App\Http\Controllers\Crop;

use App\DataTables\Crop\SupplierDataTable;
use App\Http\Requests\Crop\CreateSupplierRequest;
use App\Http\Requests\Crop\UpdateSupplierRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Crop\SupplierRepository;
use Illuminate\Http\Request;
use Flash;

class SupplierController extends AppBaseController
{
    /** @var SupplierRepository $supplierRepository*/
    private $supplierRepository;

    public function __construct(SupplierRepository $supplierRepo)
    {
        $this->supplierRepository = $supplierRepo;
    }

    /**
     * Display a listing of the Supplier.
     */
    public function index(SupplierDataTable $supplierDataTable)
    {
    return $supplierDataTable->render('crop.suppliers.index');
    }


    /**
     * Show the form for creating a new Supplier.
     */
    public function create()
    {
        return view('crop.suppliers.create');
    }

    /**
     * Store a newly created Supplier in storage.
     */
    public function store(CreateSupplierRequest $request)
    {
        $input = $request->all();

        $supplier = $this->supplierRepository->create($input);

        Flash::success('Supplier saved successfully.');

        return redirect(route('crop.suppliers.index'));
    }

    /**
     * Display the specified Supplier.
     */
    public function show($id)
    {
        $supplier = $this->supplierRepository->find($id);

        if (empty($supplier)) {
            Flash::error('Supplier not found');

            return redirect(route('crop.suppliers.index'));
        }

        return view('crop.suppliers.show')->with('supplier', $supplier);
    }

    /**
     * Show the form for editing the specified Supplier.
     */
    public function edit($id)
    {
        $supplier = $this->supplierRepository->find($id);

        if (empty($supplier)) {
            Flash::error('Supplier not found');

            return redirect(route('crop.suppliers.index'));
        }

        return view('crop.suppliers.edit')->with('supplier', $supplier);
    }

    /**
     * Update the specified Supplier in storage.
     */
    public function update($id, UpdateSupplierRequest $request)
    {
        $supplier = $this->supplierRepository->find($id);

        if (empty($supplier)) {
            Flash::error('Supplier not found');

            return redirect(route('crop.suppliers.index'));
        }

        $supplier = $this->supplierRepository->update($request->all(), $id);

        Flash::success('Supplier updated successfully.');

        return redirect(route('crop.suppliers.index'));
    }

    /**
     * Remove the specified Supplier from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $supplier = $this->supplierRepository->find($id);

        if (empty($supplier)) {
            Flash::error('Supplier not found');

            return redirect(route('crop.suppliers.index'));
        }

        $this->supplierRepository->delete($id);

        Flash::success('Supplier deleted successfully.');

        return redirect(route('crop.suppliers.index'));
    }
}
