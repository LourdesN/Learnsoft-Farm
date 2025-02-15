<?php

namespace App\Http\Controllers\Crop;

use App\DataTables\Crop\SaleDataTable;
use App\Http\Requests\Crop\CreateSaleRequest;
use App\Http\Requests\Crop\UpdateSaleRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Crop\Customer;
use App\Models\Crop\Harvest;
use App\Models\Crop\Sale;
use App\Repositories\Crop\SaleRepository;
use Illuminate\Http\Request;
use Flash;

class SaleController extends AppBaseController
{
    /** @var SaleRepository $saleRepository*/
    private $saleRepository;

    public function __construct(SaleRepository $saleRepo)
    {
        $this->saleRepository = $saleRepo;
    }

    /**
     * Display a listing of the Sale.
     */
    public function index(SaleDataTable $saleDataTable)
    {
    return $saleDataTable->render('crop.sales.index');
    }


    /**
     * Show the form for creating a new Sale.
     */
    public function create()
    {
         // hii ndio inaenable the drop down
        $customers = Customer::all();
        $harvestedCrops = Harvest::with('crop')->get();
        return view('crop.sales.create', compact('customers','harvestedCrops'));
    }

    /**
     * Store a newly created Sale in storage.
     */
    public function store(Request $request)
    {
        // Validate and create the sale
        $validatedData = $request->validate(Sale::$rules);
        $sale = Sale::create($validatedData);

        // Calculate remaining quantity for the related harvest
        $this->calculateRemainingQuantity($sale->harvest_id);

        return redirect()->route('crop.sales.index')->with('success', 'Sale recorded and remaining quantity updated.');
    }

    protected function calculateRemainingQuantity($harvestId)
    {
        // Find the harvest
        $harvest = Harvest::findOrFail($harvestId);

        // Calculate remaining quantity
        $harvest->calculateRemainingQuantity();
    }

    /**
     * Display the specified Sale.
     */
    public function show($id)
    {
        $sale = $this->saleRepository->find($id);
        $harvestedCrops = Harvest::with('crop')->get();
        $customers = Customer::all();

        if (empty($sale)) {
            Flash::error('Sale not found');

            return redirect(route('crop.sales.index'));
        }

        return view('crop.sales.show', compact('customers', 'harvestedCrops'))->with('sale', $sale);
    }

    /**
     * Show the form for editing the specified Sale.
     */
    public function edit($id)
    {
        $sale = $this->saleRepository->find($id);
        $customers = Customer::all();
        $harvestedCrops = Harvest::with('crop')->get();
        if (empty($sale)) {
            Flash::error('Sale not found');

            return redirect(route('crop.sales.index'));
        }

        return view('crop.sales.edit', compact('customers', 'harvestedCrops'))->with('sale', $sale);
    }

    /**
     * Update the specified Sale in storage.
     */
    public function update($id, UpdateSaleRequest $request)
    {
        $sale = $this->saleRepository->find($id);

        if (empty($sale)) {
            Flash::error('Sale not found');

            return redirect(route('crop.sales.index'));
        }

        $sale = $this->saleRepository->update($request->all(), $id);

        Flash::success('Sale updated successfully.');

        return redirect(route('crop.sales.index'));
    }

    /**
     * Remove the specified Sale from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $sale = $this->saleRepository->find($id);

        if (empty($sale)) {
            Flash::error('Sale not found');

            return redirect(route('crop.sales.index'));
        }

        $this->saleRepository->delete($id);

        Flash::success('Sale deleted successfully.');

        return redirect(route('crop.sales.index'));
    }
}
