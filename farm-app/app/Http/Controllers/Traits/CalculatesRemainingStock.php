<?php
namespace App\Http\Controllers\Traits;

use App\Models\crop\Stock;
use App\Models\crop\PesticideApplication;
use App\Models\crop\FertilizerApplication;
trait CalculatesRemainingStock
{
    protected function calculateRemainingStock($stockId)
    {
        // Find the stock
        $stock = Stock::findOrFail($stockId);

        // Initialize applications variable
        $applications = 0;

        // Calculate the remaining stock based on the stock type
        if ($stock->stock_type == 'fertilizer') {
            // Get the total quantity used in fertilizer applications
            $applications = FertilizerApplication::where('stock_id', $stockId)->sum('quantity');
        } elseif ($stock->stock_type == 'Pesticide') {
            // Get the total quantity used in pesticide applications
            $applications = PesticideApplication::where('stock_id', $stockId)->sum('quantity');
        }

        // Calculate the remaining stock
        $stock->remaining_stock = $stock->quantity - $applications;

        // Ensure the remaining stock is not negative
        if ($stock->remaining_stock < 0) {
            $stock->remaining_stock = 0;
        }

        // Save the updated stock
        $stock->save();
    }
}