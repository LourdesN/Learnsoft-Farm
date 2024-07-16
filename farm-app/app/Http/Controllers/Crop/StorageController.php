<?php

namespace App\Http\Controllers\Crop;

use App\DataTables\Crop\StorageDataTable;
use App\Http\Requests\Crop\CreateStorageRequest;
use App\Http\Requests\Crop\UpdateStorageRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Crop\StorageRepository;
use Illuminate\Http\Request;
use Flash;

class StorageController extends AppBaseController
{
    /** @var StorageRepository $storageRepository*/
    private $storageRepository;

    public function __construct(StorageRepository $storageRepo)
    {
        $this->storageRepository = $storageRepo;
    }

    /**
     * Display a listing of the Storage.
     */
    public function index(StorageDataTable $storageDataTable)
    {
    return $storageDataTable->render('crop.storages.index');
    }


    /**
     * Show the form for creating a new Storage.
     */
    public function create()
    {
        return view('crop.storages.create');
    }

    /**
     * Store a newly created Storage in storage.
     */
    public function store(CreateStorageRequest $request)
    {
        $input = $request->all();

        $storage = $this->storageRepository->create($input);

        Flash::success('Storage saved successfully.');

        return redirect(route('crop.storages.index'));
    }

    /**
     * Display the specified Storage.
     */
    public function show($id)
    {
        $storage = $this->storageRepository->find($id);

        if (empty($storage)) {
            Flash::error('Storage not found');

            return redirect(route('crop.storages.index'));
        }

        return view('crop.storages.show')->with('storage', $storage);
    }

    /**
     * Show the form for editing the specified Storage.
     */
    public function edit($id)
    {
        $storage = $this->storageRepository->find($id);

        if (empty($storage)) {
            Flash::error('Storage not found');

            return redirect(route('crop.storages.index'));
        }

        return view('crop.storages.edit')->with('storage', $storage);
    }

    /**
     * Update the specified Storage in storage.
     */
    public function update($id, UpdateStorageRequest $request)
    {
        $storage = $this->storageRepository->find($id);

        if (empty($storage)) {
            Flash::error('Storage not found');

            return redirect(route('crop.storages.index'));
        }

        $storage = $this->storageRepository->update($request->all(), $id);

        Flash::success('Storage updated successfully.');

        return redirect(route('crop.storages.index'));
    }

    /**
     * Remove the specified Storage from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $storage = $this->storageRepository->find($id);

        if (empty($storage)) {
            Flash::error('Storage not found');

            return redirect(route('crop.storages.index'));
        }

        $this->storageRepository->delete($id);

        Flash::success('Storage deleted successfully.');

        return redirect(route('crop.storages.index'));
    }
}
