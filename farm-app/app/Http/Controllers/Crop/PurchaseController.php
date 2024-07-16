<?php

namespace App\Http\Controllers\Crop;

use App\DataTables\Crop\PurchaseDataTable;
use App\Http\Requests\Crop\CreatePurchaseRequest;
use App\Http\Requests\Crop\UpdatePurchaseRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Crop\PurchaseRepository;
use Illuminate\Http\Request;
use Flash;

class PurchaseController extends AppBaseController
{
    /** @var PurchaseRepository $purchaseRepository*/
    private $purchaseRepository;

    public function __construct(PurchaseRepository $purchaseRepo)
    {
        $this->purchaseRepository = $purchaseRepo;
    }

    /**
     * Display a listing of the Purchase.
     */
    public function index(PurchaseDataTable $purchaseDataTable)
    {
    return $purchaseDataTable->render('crop.purchases.index');
    }


    /**
     * Show the form for creating a new Purchase.
     */
    public function create()
    {
        return view('crop.purchases.create');
    }

    /**
     * Store a newly created Purchase in storage.
     */
    public function store(CreatePurchaseRequest $request)
    {
        $input = $request->all();

        $purchase = $this->purchaseRepository->create($input);

        Flash::success('Purchase saved successfully.');

        return redirect(route('crop.purchases.index'));
    }

    /**
     * Display the specified Purchase.
     */
    public function show($id)
    {
        $purchase = $this->purchaseRepository->find($id);

        if (empty($purchase)) {
            Flash::error('Purchase not found');

            return redirect(route('crop.purchases.index'));
        }

        return view('crop.purchases.show')->with('purchase', $purchase);
    }

    /**
     * Show the form for editing the specified Purchase.
     */
    public function edit($id)
    {
        $purchase = $this->purchaseRepository->find($id);

        if (empty($purchase)) {
            Flash::error('Purchase not found');

            return redirect(route('crop.purchases.index'));
        }

        return view('crop.purchases.edit')->with('purchase', $purchase);
    }

    /**
     * Update the specified Purchase in storage.
     */
    public function update($id, UpdatePurchaseRequest $request)
    {
        $purchase = $this->purchaseRepository->find($id);

        if (empty($purchase)) {
            Flash::error('Purchase not found');

            return redirect(route('crop.purchases.index'));
        }

        $purchase = $this->purchaseRepository->update($request->all(), $id);

        Flash::success('Purchase updated successfully.');

        return redirect(route('crop.purchases.index'));
    }

    /**
     * Remove the specified Purchase from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $purchase = $this->purchaseRepository->find($id);

        if (empty($purchase)) {
            Flash::error('Purchase not found');

            return redirect(route('crop.purchases.index'));
        }

        $this->purchaseRepository->delete($id);

        Flash::success('Purchase deleted successfully.');

        return redirect(route('crop.purchases.index'));
    }
}
