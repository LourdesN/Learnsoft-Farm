<?php
namespace App\Http\Controllers;

use App\Models\CropCategory;
use Illuminate\Http\Request;

class CropCategoryController extends Controller
{
    public function index()
    {
        $cropCategories = CropCategory::all();
        return view('crop_categories.index', compact('cropCategories'));
    }

    public function create()
    {
        return view('crop_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);

        CropCategory::create($request->all());

        return redirect()->route('crop_categories.index')
            ->with('success', 'Crop Category created successfully.');
    }

    public function show(CropCategory $cropCategory)
    {
        return view('crop_categories.show', compact('cropCategory'));
    }

    public function edit(CropCategory $cropCategory)
    {
        return view('crop_categories.edit', compact('cropCategory'));
    }

    public function update(Request $request, CropCategory $cropCategory)
    {
        $request->validate(['name' => 'required']);

        $cropCategory->update($request->all());

        return redirect()->route('crop_categories.index')
            ->with('success', 'Crop Category updated successfully.');
    }

    public function destroy(CropCategory $cropCategory)
    {
        $cropCategory->delete();

        return redirect()->route('crop_categories.index')
            ->with('success', 'Crop Category deleted successfully.');
    }
}

