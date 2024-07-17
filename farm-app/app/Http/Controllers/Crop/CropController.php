<?php

namespace App\Http\Controllers\Crop;

use App\DataTables\Crop\CropDataTable;
use App\Http\Requests\Crop\CreateCropRequest;
use App\Http\Requests\Crop\UpdateCropRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Crop\CropCategory;
use App\Repositories\Crop\CropRepository;
use Illuminate\Http\Request;
use Flash;

class CropController extends AppBaseController
{
    /** @var CropRepository $cropRepository*/
    private $cropRepository;

    public function __construct(CropRepository $cropRepo)
    {
        $this->cropRepository = $cropRepo;
    }

    /**
     * Display a listing of the Crop.
     */
    public function index(CropDataTable $cropDataTable)
    {
    return $cropDataTable->render('crop.crops.index');
    }


    /**
     * Show the form for creating a new Crop.
     */
    public function create()
    {
        // hii ndio inaenable the drop down
        $cropCategories = CropCategory::all();
        return view('crop.crops.create',compact('cropCategories'));
    }

    /**
     * Store a newly created Crop in storage.
     */
    public function store(CreateCropRequest $request)
    {
        $input = $request->all();

        $crop = $this->cropRepository->create($input);

        Flash::success('Crop saved successfully.');

        return redirect(route('crop.crops.index'));
    }

    /**
     * Display the specified Crop.
     */
    public function show($id)
    {
        $crop = $this->cropRepository->find($id);

        if (empty($crop)) {
            Flash::error('Crop not found');

            return redirect(route('crop.crops.index'));
        }

        return view('crop.crops.show')->with('crop', $crop);
    }

    /**
     * Show the form for editing the specified Crop.
     */
    public function edit($id)
    {
        $crop = $this->cropRepository->find($id);
        $cropCategories = CropCategory::all();
        if (empty($crop)) {
            Flash::error('Crop not found');

            return redirect(route('crop.crops.index'));
        }

        return view('crop.crops.edit', compact('cropCategories'))->with('crop', $crop);
    }

    /**
     * Update the specified Crop in storage.
     */
    public function update($id, UpdateCropRequest $request)
    {
        $crop = $this->cropRepository->find($id);

        if (empty($crop)) {
            Flash::error('Crop not found');

            return redirect(route('crop.crops.index'));
        }

        $crop = $this->cropRepository->update($request->all(), $id);

        Flash::success('Crop updated successfully.');

        return redirect(route('crop.crops.index'));
    }

    /**
     * Remove the specified Crop from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $crop = $this->cropRepository->find($id);

        if (empty($crop)) {
            Flash::error('Crop not found');

            return redirect(route('crop.crops.index'));
        }

        $this->cropRepository->delete($id);

        Flash::success('Crop deleted successfully.');

        return redirect(route('crop.crops.index'));
    }
}
