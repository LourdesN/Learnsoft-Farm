<?php

namespace App\Http\Controllers;

use App\Models\Revenue;
use App\Models\Sale;
use Illuminate\Http\Request;

class RevenueController extends Controller
{
    public function index()
    {
        $revenues = Revenue::with('sale')->get();
        return view('revenues.index', compact('revenues'));
    }

    public function create()
    {
        $sales = Sale::all();
        return view('revenues.create', compact('sales'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sale_id' => 'required|exists:sales,id',
            'amount' => 'required|numeric',
            'revenue_date' => 'required|date',
        ]);

        Revenue::create($request->all());

        return redirect()->route('revenues.index')->with('success', 'Revenue created successfully.');
    }

    public function show(Revenue $revenue)
    {
        return view('revenues.show', compact('revenue'));
    }

    public function edit(Revenue $revenue)
    {
        $sales = Sale::all();
        return view('revenues.edit', compact('revenue', 'sales'));
    }

    public function update(Request $request, Revenue $revenue)
    {
        $request->validate([
            'sale_id' => 'required|exists:sales,id',
            'amount' => 'required|numeric',
            'revenue_date' => 'required|date',
        ]);

        $revenue->update($request->all());

        return redirect()->route('revenues.index')->with('success', 'Revenue updated successfully.');
    }

    public function destroy(Revenue $revenue)
    {
        $revenue->delete();

        return redirect()->route('revenues.index')->with('success', 'Revenue deleted successfully.');
    }
}

