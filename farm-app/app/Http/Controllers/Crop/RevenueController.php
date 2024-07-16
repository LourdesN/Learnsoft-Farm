<?php

namespace App\Http\Controllers\Crop;

use App\DataTables\Crop\RevenueDataTable;
use App\Http\Requests\Crop\CreateRevenueRequest;
use App\Http\Requests\Crop\UpdateRevenueRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Crop\RevenueRepository;
use Illuminate\Http\Request;
use Flash;

class RevenueController extends AppBaseController
{
    /** @var RevenueRepository $revenueRepository*/
    private $revenueRepository;

    public function __construct(RevenueRepository $revenueRepo)
    {
        $this->revenueRepository = $revenueRepo;
    }

    /**
     * Display a listing of the Revenue.
     */
    public function index(RevenueDataTable $revenueDataTable)
    {
    return $revenueDataTable->render('crop.revenues.index');
    }


    /**
     * Show the form for creating a new Revenue.
     */
    public function create()
    {
        return view('crop.revenues.create');
    }

    /**
     * Store a newly created Revenue in storage.
     */
    public function store(CreateRevenueRequest $request)
    {
        $input = $request->all();

        $revenue = $this->revenueRepository->create($input);

        Flash::success('Revenue saved successfully.');

        return redirect(route('crop.revenues.index'));
    }

    /**
     * Display the specified Revenue.
     */
    public function show($id)
    {
        $revenue = $this->revenueRepository->find($id);

        if (empty($revenue)) {
            Flash::error('Revenue not found');

            return redirect(route('crop.revenues.index'));
        }

        return view('crop.revenues.show')->with('revenue', $revenue);
    }

    /**
     * Show the form for editing the specified Revenue.
     */
    public function edit($id)
    {
        $revenue = $this->revenueRepository->find($id);

        if (empty($revenue)) {
            Flash::error('Revenue not found');

            return redirect(route('crop.revenues.index'));
        }

        return view('crop.revenues.edit')->with('revenue', $revenue);
    }

    /**
     * Update the specified Revenue in storage.
     */
    public function update($id, UpdateRevenueRequest $request)
    {
        $revenue = $this->revenueRepository->find($id);

        if (empty($revenue)) {
            Flash::error('Revenue not found');

            return redirect(route('crop.revenues.index'));
        }

        $revenue = $this->revenueRepository->update($request->all(), $id);

        Flash::success('Revenue updated successfully.');

        return redirect(route('crop.revenues.index'));
    }

    /**
     * Remove the specified Revenue from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $revenue = $this->revenueRepository->find($id);

        if (empty($revenue)) {
            Flash::error('Revenue not found');

            return redirect(route('crop.revenues.index'));
        }

        $this->revenueRepository->delete($id);

        Flash::success('Revenue deleted successfully.');

        return redirect(route('crop.revenues.index'));
    }
}
