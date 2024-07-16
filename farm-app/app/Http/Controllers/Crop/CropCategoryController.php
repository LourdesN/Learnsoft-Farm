<?php

namespace App\Http\Controllers\Crop;

use App\DataTables\Crop\CropCategoryDataTable;
use App\Http\Requests\Crop\CreateCropCategoryRequest;
use App\Http\Requests\Crop\UpdateCropCategoryRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Crop\CropCategoryRepository;
use Illuminate\Http\Request;
use Flash;

class CropCategoryController extends AppBaseController
{
    /** @var CropCategoryRepository $cropCategoryRepository*/
    private $cropCategoryRepository;

    public function __construct(CropCategoryRepository $cropCategoryRepo)
    {
        $this->cropCategoryRepository = $cropCategoryRepo;
    }

    /**
     * Display a listing of the CropCategory.
     */
    public function index(CropCategoryDataTable $cropCategoryDataTable)
    {
    return $cropCategoryDataTable->render('crop.crop_categories.index');
    }


    /**
     * Show the form for creating a new CropCategory.
     */
    public function create()
    {
        return view('crop.crop_categories.create');
    }

    /**
     * Store a newly created CropCategory in storage.
     */
    public function store(CreateCropCategoryRequest $request)
    {
        $input = $request->all();

        $cropCategory = $this->cropCategoryRepository->create($input);

        Flash::success('Crop Category saved successfully.');

        return redirect(route('crop.cropCategories.index'));
    }

    /**
     * Display the specified CropCategory.
     */
    public function show($id)
    {
        $cropCategory = $this->cropCategoryRepository->find($id);

        if (empty($cropCategory)) {
            Flash::error('Crop Category not found');

            return redirect(route('crop.cropCategories.index'));
        }

        return view('crop.crop_categories.show')->with('cropCategory', $cropCategory);
    }

    /**
     * Show the form for editing the specified CropCategory.
     */
    public function edit($id)
    {
        $cropCategory = $this->cropCategoryRepository->find($id);

        if (empty($cropCategory)) {
            Flash::error('Crop Category not found');

            return redirect(route('crop.cropCategories.index'));
        }

        return view('crop.crop_categories.edit')->with('cropCategory', $cropCategory);
    }

    /**
     * Update the specified CropCategory in storage.
     */
    public function update($id, UpdateCropCategoryRequest $request)
    {
        $cropCategory = $this->cropCategoryRepository->find($id);

        if (empty($cropCategory)) {
            Flash::error('Crop Category not found');

            return redirect(route('crop.cropCategories.index'));
        }

        $cropCategory = $this->cropCategoryRepository->update($request->all(), $id);

        Flash::success('Crop Category updated successfully.');

        return redirect(route('crop.cropCategories.index'));
    }

    /**
     * Remove the specified CropCategory from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cropCategory = $this->cropCategoryRepository->find($id);

        if (empty($cropCategory)) {
            Flash::error('Crop Category not found');

            return redirect(route('crop.cropCategories.index'));
        }

        $this->cropCategoryRepository->delete($id);

        Flash::success('Crop Category deleted successfully.');

        return redirect(route('crop.cropCategories.index'));
    }
}
