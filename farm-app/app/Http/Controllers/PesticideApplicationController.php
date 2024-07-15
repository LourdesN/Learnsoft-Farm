<?php
namespace App\Http\Controllers;

use App\Models\PesticideApplication;
use App\Models\Stock;
use Illuminate\Http\Request;

class PesticideApplicationController extends Controller
{
    public function index()
    {
        $pesticideApplications = PesticideApplication::with('stock')->get();
        return view('pesticide_applications.index', compact('pesticideApplications'));
    }

    public function create()
    {
        $stocks = Stock::all();
        return view('pesticide_applications.create', compact('stocks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'stock_id' => 'required|exists:stocks,id',
            'application_date' => 'required|date',
            'quantity' => 'required|integer',
        ]);

        PesticideApplication::create($request->all());

        return redirect()->route('pesticide_applications.index')->with('success', 'Pesticide Application created successfully.');
    }

    public function show(PesticideApplication $pesticideApplication)
    {
        return view('pesticide_applications.show', compact('pesticideApplication'));
    }

    public function edit(PesticideApplication $pesticideApplication)
    {
        $stocks = Stock::all();
        return view('pesticide_applications.edit', compact('pesticideApplication', 'stocks'));
    }

    public function update(Request $request, PesticideApplication $pesticideApplication)
    {
        $request->validate([
            'stock_id' => 'required|exists:stocks,id',
            'application_date' => 'required|date',
            'quantity' => 'required|integer',
        ]);

        $pesticideApplication->update($request->all());

        return redirect()->route('pesticide_applications.index')->with('success', 'Pesticide Application updated successfully.');
    }

    public function destroy(PesticideApplication $pesticideApplication)
    {
        $pesticideApplication->delete();

        return redirect()->route('pesticide_applications.index')->with('success', 'Pesticide Application deleted successfully.');
    }
}

