<?php


namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\Harvest;
use App\Models\Storage;
use App\Models\StoredCrop;
use Illuminate\Http\Request;

class StoredCropController extends Controller
{
    public function index()
    {
        $storedCrops = StoredCrop::with(['crop', 'storage', 'harvest'])->get();
        return view('stored_crops.index', compact('storedCrops'));
    }

 public function create()
{
    $crops = Crop::all();
    $storages = Storage::all();
    $harvests = Harvest::all();

    return view('stored_crops.create', compact('crops', 'storages', 'harvests'));
}


    public function store(Request $request)
    {
        // Validate and store the new stored crop
        StoredCrop::create($request->all());

        return redirect()->route('stored_crops.index')
            ->with('success', 'Stored Crop created successfully.');
    }

    public function show($id)
    {
        $storedCrop = StoredCrop::with(['crop', 'storage', 'harvest'])->findOrFail($id);
        return view('stored_crops.show', compact('storedCrop'));
    }

    public function edit($id)
    {
        $storedCrop = StoredCrop::findOrFail($id);
        // You may need to pass related models (crop, storage, harvest) for dropdowns or other forms

        return view('stored_crops.edit', compact('storedCrop'));
    }

    public function update(Request $request, $id)
    {
        $storedCrop = StoredCrop::findOrFail($id);
        $storedCrop->update($request->all());

        return redirect()->route('stored_crops.index')
            ->with('success', 'Stored Crop updated successfully.');
    }

    public function destroy($id)
    {
        StoredCrop::findOrFail($id)->delete();

        return redirect()->route('stored_crops.index')
            ->with('success', 'Stored Crop deleted successfully.');
    }
}

