<?php

namespace App\Http\Controllers\Crop;

use App\DataTables\Crop\StoredCropDataTable;
use App\Http\Requests\Crop\CreateStoredCropRequest;
use App\Http\Requests\Crop\UpdateStoredCropRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Crop\Crop;
use App\Models\Crop\Harvest;
use App\Models\Crop\Storage;
use App\Repositories\Crop\StoredCropRepository;
use Illuminate\Http\Request;
use Flash;

class StoredCropController extends AppBaseController
{
    /** @var StoredCropRepository $storedCropRepository*/
    private $storedCropRepository;

    public function __construct(StoredCropRepository $storedCropRepo)
    {
        $this->storedCropRepository = $storedCropRepo;
    }

    /**
     * Display a listing of the StoredCrop.
     */
    public function index(StoredCropDataTable $storedCropDataTable)
    {
    return $storedCropDataTable->render('crop.stored_crops.index');
    }


    /**
     * Show the form for creating a new StoredCrop.
     */
    public function create()
    {
        // hii ndio inaenable the drop down
        $crops = Crop::all();
        $storages = Storage::all();
        $harvests = Harvest::all();
        return view('crop.stored_crops.create',compact('crops','storages', 'harvests'));
    }

    /**
     * Store a newly created StoredCrop in storage.
     */
    public function store(CreateStoredCropRequest $request)
    {
        $input = $request->all();

        $storedCrop = $this->storedCropRepository->create($input);

        Flash::success('Stored Crop saved successfully.');

        return redirect(route('crop.storedCrops.index'));
    }

    /**
     * Display the specified StoredCrop.
     */
    public function show($id)
    {
        $storedCrop = $this->storedCropRepository->find($id);

        if (empty($storedCrop)) {
            Flash::error('Stored Crop not found');

            return redirect(route('crop.storedCrops.index'));
        }

        return view('crop.stored_crops.show')->with('storedCrop', $storedCrop);
    }

    /**
     * Show the form for editing the specified StoredCrop.
     */
    public function edit($id)
    {
        $storedCrop = $this->storedCropRepository->find($id);
        $crops = Crop::all();
        $storages = Storage::all();
        $harvests = Harvest::all();

        if (empty($storedCrop)) {
            Flash::error('Stored Crop not found');

            return redirect(route('crop.storedCrops.index'));
        }

        return view('crop.stored_crops.edit',compact('crops','storages', 'harvests') )->with('storedCrop', $storedCrop);
    }

    /**
     * Update the specified StoredCrop in storage.
     */
    public function update($id, UpdateStoredCropRequest $request)
    {
        $storedCrop = $this->storedCropRepository->find($id);

        if (empty($storedCrop)) {
            Flash::error('Stored Crop not found');

            return redirect(route('crop.storedCrops.index'));
        }

        $storedCrop = $this->storedCropRepository->update($request->all(), $id);

        Flash::success('Stored Crop updated successfully.');

        return redirect(route('crop.storedCrops.index'));
    }

    /**
     * Remove the specified StoredCrop from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $storedCrop = $this->storedCropRepository->find($id);

        if (empty($storedCrop)) {
            Flash::error('Stored Crop not found');

            return redirect(route('crop.storedCrops.index'));
        }

        $this->storedCropRepository->delete($id);

        Flash::success('Stored Crop deleted successfully.');

        return redirect(route('crop.storedCrops.index'));
    }
}
