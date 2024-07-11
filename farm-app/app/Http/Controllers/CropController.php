<?php
namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\CropCategory;
use Illuminate\Http\Request;

class CropController extends Controller
{
    public function index()
    {
        $crops = Crop::with('cropCategory')->get();
        return view('crops.index', compact('crops'));
    }

    public function create()
    {
        $cropCategories = CropCategory::all();
        return view('crops.create', compact('cropCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'crop_categories_id' => 'required|exists:crop_categories,id',
            'planting_date' => 'required|date',
            'harvesting_date' => 'required|date',
        ]);

        Crop::create($request->all());

        return redirect()->route('crops.index')
            ->with('success', 'Crop created successfully.');
    }

    public function show(Crop $crop)
    {
        return view('crops.show', compact('crop'));
    }

    public function edit(Crop $crop)
    {
        $cropCategories = CropCategory::all();
        return view('crops.edit', compact('crop', 'cropCategories'));
    }

    public function update(Request $request, Crop $crop)
    {
        $request->validate([
            'name' => 'required',
            'crop_categories_id' => 'required|exists:crop_categories,id',
            'planting_date' => 'required|date',
            'harvesting_date' => 'required|date',
        ]);

        $crop->update($request->all());

        return redirect()->route('crops.index')
            ->with('success', 'Crop updated successfully.');
    }

    public function destroy(Crop $crop)
    {
        $crop->delete();

        return redirect()->route('crops.index')
            ->with('success', 'Crop deleted successfully.');
    }
}

