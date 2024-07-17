<?php

namespace App\Http\Controllers\Crop;

use App\DataTables\Crop\FertilizerApplicationDataTable;
use App\Http\Requests\Crop\CreateFertilizerApplicationRequest;
use App\Http\Requests\Crop\UpdateFertilizerApplicationRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Crop\Stock;
use App\Repositories\Crop\FertilizerApplicationRepository;
use Illuminate\Http\Request;
use Flash;

class FertilizerApplicationController extends AppBaseController
{
    /** @var FertilizerApplicationRepository $fertilizerApplicationRepository*/
    private $fertilizerApplicationRepository;

    public function __construct(FertilizerApplicationRepository $fertilizerApplicationRepo)
    {
        $this->fertilizerApplicationRepository = $fertilizerApplicationRepo;
    }

    /**
     * Display a listing of the FertilizerApplication.
     */
    public function index(FertilizerApplicationDataTable $fertilizerApplicationDataTable)
    {
    return $fertilizerApplicationDataTable->render('crop.fertilizer_applications.index');
    }


    /**
     * Show the form for creating a new FertilizerApplication.
     */
    public function create()
    {
        $stocks =Stock::all();
        return view('crop.fertilizer_applications.create', compact('stocks'));
    }

    /**
     * Store a newly created FertilizerApplication in storage.
     */
    public function store(CreateFertilizerApplicationRequest $request)
    {
        $input = $request->all();

        $fertilizerApplication = $this->fertilizerApplicationRepository->create($input);

        Flash::success('Fertilizer Application saved successfully.');

        return redirect(route('crop.fertilizerApplications.index'));
    }

    /**
     * Display the specified FertilizerApplication.
     */
    public function show($id)
    {
        $fertilizerApplication = $this->fertilizerApplicationRepository->find($id);

        if (empty($fertilizerApplication)) {
            Flash::error('Fertilizer Application not found');

            return redirect(route('crop.fertilizerApplications.index'));
        }

        return view('crop.fertilizer_applications.show')->with('fertilizerApplication', $fertilizerApplication);
    }

    /**
     * Show the form for editing the specified FertilizerApplication.
     */
    public function edit($id)
    {
        $fertilizerApplication = $this->fertilizerApplicationRepository->find($id);
        $stocks =Stock::all();
        if (empty($fertilizerApplication)) {
            Flash::error('Fertilizer Application not found');

            return redirect(route('crop.fertilizerApplications.index'));
        }

        return view('crop.fertilizer_applications.edit', compact('stocks'))->with('fertilizerApplication', $fertilizerApplication);
    }

    /**
     * Update the specified FertilizerApplication in storage.
     */
    public function update($id, UpdateFertilizerApplicationRequest $request)
    {
        $fertilizerApplication = $this->fertilizerApplicationRepository->find($id);

        if (empty($fertilizerApplication)) {
            Flash::error('Fertilizer Application not found');

            return redirect(route('crop.fertilizerApplications.index'));
        }

        $fertilizerApplication = $this->fertilizerApplicationRepository->update($request->all(), $id);

        Flash::success('Fertilizer Application updated successfully.');

        return redirect(route('crop.fertilizerApplications.index'));
    }

    /**
     * Remove the specified FertilizerApplication from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $fertilizerApplication = $this->fertilizerApplicationRepository->find($id);

        if (empty($fertilizerApplication)) {
            Flash::error('Fertilizer Application not found');

            return redirect(route('crop.fertilizerApplications.index'));
        }

        $this->fertilizerApplicationRepository->delete($id);

        Flash::success('Fertilizer Application deleted successfully.');

        return redirect(route('crop.fertilizerApplications.index'));
    }
}
