<?php
namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\StoredCrop;
use App\Models\Customer;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with(['storedCrop', 'customer'])->get();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $storedCrops = StoredCrop::all();
        $customers = Customer::all();
        return view('sales.create', compact('storedCrops', 'customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'stored_crops_id' => 'required|exists:stored_crops,id',
            'customer_id' => 'required|exists:customers,id',
            'sales_date' => 'required|date',
            'quantity' => 'required|integer',
            'price_per_unit' => 'required|numeric',
            'total_price' => 'required|numeric',
        ]);

        Sale::create($request->all());

        return redirect()->route('sales.index')->with('success', 'Sale created successfully.');
    }

    public function show(Sale $sale)
    {
        return view('sales.show', compact('sale'));
    }

    public function edit(Sale $sale)
    {
        $storedCrops = StoredCrop::all();
        $customers = Customer::all();
        return view('sales.edit', compact('sale', 'storedCrops', 'customers'));
    }

    public function update(Request $request, Sale $sale)
    {
        $request->validate([
            'stored_crops_id' => 'required|exists:stored_crops,id',
            'customer_id' => 'required|exists:customers,id',
            'sales_date' => 'required|date',
            'quantity' => 'required|integer',
            'price_per_unit' => 'required|numeric',
            'total_price' => 'required|numeric',
        ]);

        $sale->update($request->all());

        return redirect()->route('sales.index')->with('success', 'Sale updated successfully.');
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();

        return redirect()->route('sales.index')->with('success', 'Sale deleted successfully.');
    }
}
