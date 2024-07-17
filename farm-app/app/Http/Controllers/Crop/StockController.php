<?php

namespace App\Http\Controllers\Crop;

use App\DataTables\Crop\StockDataTable;
use App\Http\Requests\Crop\CreateStockRequest;
use App\Http\Requests\Crop\UpdateStockRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Crop\Supplier;
use App\Repositories\Crop\StockRepository;
use Illuminate\Http\Request;
use Flash;

class StockController extends AppBaseController
{
    /** @var StockRepository $stockRepository*/
    private $stockRepository;

    public function __construct(StockRepository $stockRepo)
    {
        $this->stockRepository = $stockRepo;
    }

    /**
     * Display a listing of the Stock.
     */
    public function index(StockDataTable $stockDataTable)
    {
    return $stockDataTable->render('crop.stocks.index');
    }


    /**
     * Show the form for creating a new Stock.
     */
    public function create()
    {
        $suppliers = Supplier::all();
        return view('crop.stocks.create', compact('suppliers'));
    }

    /**
     * Store a newly created Stock in storage.
     */
    public function store(CreateStockRequest $request)
    {
        $input = $request->all();

        $stock = $this->stockRepository->create($input);

        Flash::success('Stock saved successfully.');

        return redirect(route('crop.stocks.index'));
    }

    /**
     * Display the specified Stock.
     */
    public function show($id)
    {
        $stock = $this->stockRepository->find($id);

        if (empty($stock)) {
            Flash::error('Stock not found');

            return redirect(route('crop.stocks.index'));
        }

        return view('crop.stocks.show')->with('stock', $stock);
    }

    /**
     * Show the form for editing the specified Stock.
     */
    public function edit($id)
    {
        $stock = $this->stockRepository->find($id);
        $suppliers = Supplier::all();
        if (empty($stock)) {
            Flash::error('Stock not found');

            return redirect(route('crop.stocks.index'));
        }

        return view('crop.stocks.edit',compact('suppliers'))->with('stock', $stock);
    }

    /**
     * Update the specified Stock in storage.
     */
    public function update($id, UpdateStockRequest $request)
    {
        $stock = $this->stockRepository->find($id);

        if (empty($stock)) {
            Flash::error('Stock not found');

            return redirect(route('crop.stocks.index'));
        }

        $stock = $this->stockRepository->update($request->all(), $id);

        Flash::success('Stock updated successfully.');

        return redirect(route('crop.stocks.index'));
    }

    /**
     * Remove the specified Stock from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $stock = $this->stockRepository->find($id);

        if (empty($stock)) {
            Flash::error('Stock not found');

            return redirect(route('crop.stocks.index'));
        }

        $this->stockRepository->delete($id);

        Flash::success('Stock deleted successfully.');

        return redirect(route('crop.stocks.index'));
    }
}
