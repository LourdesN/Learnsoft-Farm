<?php

// app/Http/Controllers/FertilizerApplicationController.php

namespace App\Http\Controllers;

use App\Models\FertilizerApplication;
use App\Models\Stock;
use Illuminate\Http\Request;

class FertilizerApplicationController extends Controller
{
    public function index()
    {
        $fertilizerApplications = FertilizerApplication::all();
        return view('fertilizer_applications.index', compact('fertilizerApplications'));
    }

    public function create()
    {
        // Assuming you have a form to select stocks, you can fetch them here
        $stocks = Stock::all(); // Adjust according to your Stock model
        return view('fertilizer_applications.create', compact('stocks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'stock_id' => 'required|exists:stocks,id',
            'application_date' => 'required|date',
            'quantity' => 'required|numeric',
        ]);

        FertilizerApplication::create($request->all());

        return redirect()->route('fertilizer_applications.index')
                         ->with('success', 'Fertilizer application created successfully.');
    }

    public function show($id)
    {
        $fertilizerApplication = FertilizerApplication::findOrFail($id);
        return view('fertilizer_applications.show', compact('fertilizerApplication'));
    }

    public function edit($id)
    {
        $fertilizerApplication = FertilizerApplication::findOrFail($id);
        $stocks = Stock::all(); // Fetching stocks for dropdown
        return view('fertilizer_applications.edit', compact('fertilizerApplication', 'stocks'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'stock_id' => 'required|exists:stocks,id',
            'application_date' => 'required|date',
            'quantity' => 'required|numeric',
        ]);

        $fertilizerApplication = FertilizerApplication::findOrFail($id);
        $fertilizerApplication->update($request->all());

        return redirect()->route('fertilizer_applications.index')
                         ->with('success', 'Fertilizer application updated successfully.');
    }

    public function destroy($id)
    {
        $fertilizerApplication = FertilizerApplication::findOrFail($id);
        $fertilizerApplication->delete();

        return redirect()->route('fertilizer_applications.index')
                         ->with('success', 'Fertilizer application deleted successfully.');
    }
}

