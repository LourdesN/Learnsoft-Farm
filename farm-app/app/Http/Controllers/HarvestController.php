<?php

// app/Http/Controllers/HarvestController.php

namespace App\Http\Controllers;

use App\Models\Harvest;
use App\Models\Crop;
use Illuminate\Http\Request;

class HarvestController extends Controller
{
    public function index()
    {
        $harvests = Harvest::all();
        return view('harvests.index', compact('harvests'));
    }

    public function create()
    {
        $crops = Crop::all();
        return view('harvests.create', compact('crops'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'crop_id' => 'required',
            'harvest_date' => 'required|date',
            'quantity' => 'required|integer',
            'quality' => 'nullable',
        ]);

        Harvest::create($request->all());

        return redirect()->route('harvests.index')
                         ->with('success', 'Harvest created successfully.');
    }

    public function show($id)
    {
        $harvest = Harvest::findOrFail($id);
        return view('harvests.show', compact('harvest'));
    }

    public function edit($id)
    {
        $harvest = Harvest::findOrFail($id);
        $crops = Crop::all();
        return view('harvests.edit', compact('harvest', 'crops'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'crop_id' => 'required',
            'harvest_date' => 'required|date',
            'quantity' => 'required|integer',
            'quality' => 'nullable',
        ]);

        $harvest = Harvest::findOrFail($id);
        $harvest->update($request->all());

        return redirect()->route('harvests.index')
                         ->with('success', 'Harvest updated successfully.');
    }

    public function destroy($id)
    {
        $harvest = Harvest::findOrFail($id);
        $harvest->delete();

        return redirect()->route('harvests.index')
                         ->with('success', 'Harvest deleted successfully.');
    }
}
