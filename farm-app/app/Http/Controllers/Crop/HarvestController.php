<?php

namespace App\Http\Controllers\Crop;

use App\DataTables\Crop\HarvestDataTable;
use App\Http\Requests\Crop\CreateHarvestRequest;
use App\Http\Requests\Crop\UpdateHarvestRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Crop\Crop;
use App\Repositories\Crop\HarvestRepository;
use Illuminate\Http\Request;
use Flash;

class HarvestController extends AppBaseController
{
    /** @var HarvestRepository $harvestRepository*/
    private $harvestRepository;

    public function __construct(HarvestRepository $harvestRepo)
    {
        $this->harvestRepository = $harvestRepo;
    }

    /**
     * Display a listing of the Harvest.
     */
    public function index(HarvestDataTable $harvestDataTable)
    {
    return $harvestDataTable->render('crop.harvests.index');
    }


    /**
     * Show the form for creating a new Harvest.
     */
    public function create()
    {
        $crops =Crop::all();
        return view('crop.harvests.create', compact('crops'));
    }

    /**
     * Store a newly created Harvest in storage.
     */
    public function store(CreateHarvestRequest $request)
    {
        $input = $request->all();

        $harvest = $this->harvestRepository->create($input);

        Flash::success('Harvest saved successfully.');

        return redirect(route('crop.harvests.index'));
    }

    /**
     * Display the specified Harvest.
     */
    public function show($id)
    {
        $harvest = $this->harvestRepository->find($id);

        if (empty($harvest)) {
            Flash::error('Harvest not found');

            return redirect(route('crop.harvests.index'));
        }

        return view('crop.harvests.show')->with('harvest', $harvest);
    }

    /**
     * Show the form for editing the specified Harvest.
     */
    public function edit($id)
    {
        $harvest = $this->harvestRepository->find($id);
        $crops =Crop::all();
        
        if (empty($harvest)) {
            Flash::error('Harvest not found');

            return redirect(route('crop.harvests.index'));
        }

        return view('crop.harvests.edit', compact('crops'))->with('harvest', $harvest);
    }

    /**
     * Update the specified Harvest in storage.
     */
    public function update($id, UpdateHarvestRequest $request)
    {
        $harvest = $this->harvestRepository->find($id);

        if (empty($harvest)) {
            Flash::error('Harvest not found');

            return redirect(route('crop.harvests.index'));
        }

        $harvest = $this->harvestRepository->update($request->all(), $id);

        Flash::success('Harvest updated successfully.');

        return redirect(route('crop.harvests.index'));
    }

    /**
     * Remove the specified Harvest from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $harvest = $this->harvestRepository->find($id);

        if (empty($harvest)) {
            Flash::error('Harvest not found');

            return redirect(route('crop.harvests.index'));
        }

        $this->harvestRepository->delete($id);

        Flash::success('Harvest deleted successfully.');

        return redirect(route('crop.harvests.index'));
    }
}
