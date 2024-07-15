<?php

use App\Http\Controllers\CropCategoryController;
use App\Http\Controllers\CropController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\FertilizerApplicationController;
use App\Http\Controllers\HarvestController;
use App\Http\Controllers\PesticideApplicationController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\StoredCropController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


Route::resource('crops', CropController::class);
Route::resource('crop_categories', CropCategoryController::class);
Route::resource('customers', CustomerController::class);
Route::resource('expenses', ExpenseController::class);
Route::resource('fertilizer_applications', FertilizerApplicationController::class);
Route::resource('harvests', HarvestController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('stocks', StockController::class);
Route::resource('storages', StorageController::class);
Route::resource('stored_crops', StoredCropController::class);
Route::resource('sales', SaleController::class);
Route::resource('pesticide_applications', PesticideApplicationController::class);
Route::resource('revenues', RevenueController::class);

