<?php

namespace App\Http\Controllers\Crop;

use App\DataTables\Crop\StagingDataTable;
use App\Http\Requests\Crop\CreateStagingRequest;
use App\Http\Requests\Crop\UpdateStagingRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Crop\StagingRepository;
use Illuminate\Http\Request;
use Flash;

class StagingController extends AppBaseController
{
    /** @var StagingRepository $stagingRepository*/
    private $stagingRepository;

    public function __construct(StagingRepository $stagingRepo)
    {
        $this->stagingRepository = $stagingRepo;
    }

    /**
     * Display a listing of the Staging.
     */
    public function index(StagingDataTable $stagingDataTable)
    {
    return $stagingDataTable->render('crop.stagings.index');
    }


    /**
     * Show the form for creating a new Staging.
     */
    public function create()
    {
        return view('crop.stagings.create');
    }

    /**
     * Store a newly created Staging in storage.
     */
    public function store(CreateStagingRequest $request)
    {
        $input = $request->all();

        $staging = $this->stagingRepository->create($input);

        Flash::success('Staging saved successfully.');

        return redirect(route('crop.stagings.index'));
    }

    /**
     * Display the specified Staging.
     */
    public function show($id)
    {
        $staging = $this->stagingRepository->find($id);

        if (empty($staging)) {
            Flash::error('Staging not found');

            return redirect(route('crop.stagings.index'));
        }

        return view('crop.stagings.show')->with('staging', $staging);
    }

    /**
     * Show the form for editing the specified Staging.
     */
    public function edit($id)
    {
        $staging = $this->stagingRepository->find($id);

        if (empty($staging)) {
            Flash::error('Staging not found');

            return redirect(route('crop.stagings.index'));
        }

        return view('crop.stagings.edit')->with('staging', $staging);
    }

    /**
     * Update the specified Staging in storage.
     */
    public function update($id, UpdateStagingRequest $request)
    {
        $staging = $this->stagingRepository->find($id);

        if (empty($staging)) {
            Flash::error('Staging not found');

            return redirect(route('crop.stagings.index'));
        }

        $staging = $this->stagingRepository->update($request->all(), $id);

        Flash::success('Staging updated successfully.');

        return redirect(route('crop.stagings.index'));
    }

    /**
     * Remove the specified Staging from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $staging = $this->stagingRepository->find($id);

        if (empty($staging)) {
            Flash::error('Staging not found');

            return redirect(route('crop.stagings.index'));
        }

        $this->stagingRepository->delete($id);

        Flash::success('Staging deleted successfully.');

        return redirect(route('crop.stagings.index'));
    }
}
