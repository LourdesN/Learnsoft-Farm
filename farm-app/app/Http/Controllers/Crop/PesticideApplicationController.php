<?php

namespace App\Http\Controllers\Crop;

use App\DataTables\Crop\PesticideApplicationDataTable;
use App\Http\Requests\Crop\CreatePesticideApplicationRequest;
use App\Http\Requests\Crop\UpdatePesticideApplicationRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Crop\PesticideApplicationRepository;
use Illuminate\Http\Request;
use Flash;

class PesticideApplicationController extends AppBaseController
{
    /** @var PesticideApplicationRepository $pesticideApplicationRepository*/
    private $pesticideApplicationRepository;

    public function __construct(PesticideApplicationRepository $pesticideApplicationRepo)
    {
        $this->pesticideApplicationRepository = $pesticideApplicationRepo;
    }

    /**
     * Display a listing of the PesticideApplication.
     */
    public function index(PesticideApplicationDataTable $pesticideApplicationDataTable)
    {
    return $pesticideApplicationDataTable->render('crop.pesticide_applications.index');
    }


    /**
     * Show the form for creating a new PesticideApplication.
     */
    public function create()
    {
        return view('crop.pesticide_applications.create');
    }

    /**
     * Store a newly created PesticideApplication in storage.
     */
    public function store(CreatePesticideApplicationRequest $request)
    {
        $input = $request->all();

        $pesticideApplication = $this->pesticideApplicationRepository->create($input);

        Flash::success('Pesticide Application saved successfully.');

        return redirect(route('crop.pesticideApplications.index'));
    }

    /**
     * Display the specified PesticideApplication.
     */
    public function show($id)
    {
        $pesticideApplication = $this->pesticideApplicationRepository->find($id);

        if (empty($pesticideApplication)) {
            Flash::error('Pesticide Application not found');

            return redirect(route('crop.pesticideApplications.index'));
        }

        return view('crop.pesticide_applications.show')->with('pesticideApplication', $pesticideApplication);
    }

    /**
     * Show the form for editing the specified PesticideApplication.
     */
    public function edit($id)
    {
        $pesticideApplication = $this->pesticideApplicationRepository->find($id);

        if (empty($pesticideApplication)) {
            Flash::error('Pesticide Application not found');

            return redirect(route('crop.pesticideApplications.index'));
        }

        return view('crop.pesticide_applications.edit')->with('pesticideApplication', $pesticideApplication);
    }

    /**
     * Update the specified PesticideApplication in storage.
     */
    public function update($id, UpdatePesticideApplicationRequest $request)
    {
        $pesticideApplication = $this->pesticideApplicationRepository->find($id);

        if (empty($pesticideApplication)) {
            Flash::error('Pesticide Application not found');

            return redirect(route('crop.pesticideApplications.index'));
        }

        $pesticideApplication = $this->pesticideApplicationRepository->update($request->all(), $id);

        Flash::success('Pesticide Application updated successfully.');

        return redirect(route('crop.pesticideApplications.index'));
    }

    /**
     * Remove the specified PesticideApplication from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pesticideApplication = $this->pesticideApplicationRepository->find($id);

        if (empty($pesticideApplication)) {
            Flash::error('Pesticide Application not found');

            return redirect(route('crop.pesticideApplications.index'));
        }

        $this->pesticideApplicationRepository->delete($id);

        Flash::success('Pesticide Application deleted successfully.');

        return redirect(route('crop.pesticideApplications.index'));
    }
}
