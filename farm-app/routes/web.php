<?php

use App\Http\Controllers\CropCategoryController;
use App\Http\Controllers\CropController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Admin\ExpenseController;
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

Route::resource('crop/expense_-categories', App\Http\Controllers\Crop\Expense_CategoryController::class)
    ->names([
        'index' => 'crop.expenseCategories.index',
        'store' => 'crop.expenseCategories.store',
        'show' => 'crop.expenseCategories.show',
        'update' => 'crop.expenseCategories.update',
        'destroy' => 'crop.expenseCategories.destroy',
        'create' => 'crop.expenseCategories.create',
        'edit' => 'crop.expenseCategories.edit'
    ]);
Route::resource('crop/crop-categories', App\Http\Controllers\Crop\CropCategoryController::class)
    ->names([
        'index' => 'crop.cropCategories.index',
        'store' => 'crop.cropCategories.store',
        'show' => 'crop.cropCategories.show',
        'update' => 'crop.cropCategories.update',
        'destroy' => 'crop.cropCategories.destroy',
        'create' => 'crop.cropCategories.create',
        'edit' => 'crop.cropCategories.edit'
    ]);
Route::resource('crop/storages', App\Http\Controllers\Crop\StorageController::class)
    ->names([
        'index' => 'crop.storages.index',
        'store' => 'crop.storages.store',
        'show' => 'crop.storages.show',
        'update' => 'crop.storages.update',
        'destroy' => 'crop.storages.destroy',
        'create' => 'crop.storages.create',
        'edit' => 'crop.storages.edit'
    ]);
Route::resource('crop/customers', App\Http\Controllers\Crop\CustomerController::class)
    ->names([
        'index' => 'crop.customers.index',
        'store' => 'crop.customers.store',
        'show' => 'crop.customers.show',
        'update' => 'crop.customers.update',
        'destroy' => 'crop.customers.destroy',
        'create' => 'crop.customers.create',
        'edit' => 'crop.customers.edit'
    ]);
Route::resource('crop/suppliers', App\Http\Controllers\Crop\SupplierController::class)
    ->names([
        'index' => 'crop.suppliers.index',
        'store' => 'crop.suppliers.store',
        'show' => 'crop.suppliers.show',
        'update' => 'crop.suppliers.update',
        'destroy' => 'crop.suppliers.destroy',
        'create' => 'crop.suppliers.create',
        'edit' => 'crop.suppliers.edit'
    ]);
Route::resource('crop/revenues', App\Http\Controllers\Crop\RevenueController::class)
    ->names([
        'index' => 'crop.revenues.index',
        'store' => 'crop.revenues.store',
        'show' => 'crop.revenues.show',
        'update' => 'crop.revenues.update',
        'destroy' => 'crop.revenues.destroy',
        'create' => 'crop.revenues.create',
        'edit' => 'crop.revenues.edit'
    ]);
Route::resource('crop/sales', App\Http\Controllers\Crop\SaleController::class)
    ->names([
        'index' => 'crop.sales.index',
        'store' => 'crop.sales.store',
        'show' => 'crop.sales.show',
        'update' => 'crop.sales.update',
        'destroy' => 'crop.sales.destroy',
        'create' => 'crop.sales.create',
        'edit' => 'crop.sales.edit'
    ]);
Route::resource('crop/stored-crops', App\Http\Controllers\Crop\StoredCropController::class)
    ->names([
        'index' => 'crop.storedCrops.index',
        'store' => 'crop.storedCrops.store',
        'show' => 'crop.storedCrops.show',
        'update' => 'crop.storedCrops.update',
        'destroy' => 'crop.storedCrops.destroy',
        'create' => 'crop.storedCrops.create',
        'edit' => 'crop.storedCrops.edit'
    ]);
Route::resource('crop/stocks', App\Http\Controllers\Crop\StockController::class)
    ->names([
        'index' => 'crop.stocks.index',
        'store' => 'crop.stocks.store',
        'show' => 'crop.stocks.show',
        'update' => 'crop.stocks.update',
        'destroy' => 'crop.stocks.destroy',
        'create' => 'crop.stocks.create',
        'edit' => 'crop.stocks.edit'
    ]);
Route::resource('crop/fertilizer-applications', App\Http\Controllers\Crop\FertilizerApplicationController::class)
    ->names([
        'index' => 'crop.fertilizerApplications.index',
        'store' => 'crop.fertilizerApplications.store',
        'show' => 'crop.fertilizerApplications.show',
        'update' => 'crop.fertilizerApplications.update',
        'destroy' => 'crop.fertilizerApplications.destroy',
        'create' => 'crop.fertilizerApplications.create',
        'edit' => 'crop.fertilizerApplications.edit'
    ]);
Route::resource('crop/pesticide-applications', App\Http\Controllers\Crop\PesticideApplicationController::class)
    ->names([
        'index' => 'crop.pesticideApplications.index',
        'store' => 'crop.pesticideApplications.store',
        'show' => 'crop.pesticideApplications.show',
        'update' => 'crop.pesticideApplications.update',
        'destroy' => 'crop.pesticideApplications.destroy',
        'create' => 'crop.pesticideApplications.create',
        'edit' => 'crop.pesticideApplications.edit'
    ]);

Route::get('harvests/create-from-crop/{crop}', [App\Http\Controllers\Crop\HarvestController::class, 'createFromCrop'])->name('harvests.createFromCrop');
Route::post('harvests/store-from-crop', [App\Http\Controllers\Crop\HarvestController::class, 'storeFromCrop'])->name('harvests.storeFromCrop');

Route::resource('crop/harvests', App\Http\Controllers\Crop\HarvestController::class)
    ->names([
        'index' => 'crop.harvests.index',
        'store' => 'crop.harvests.store',
        'show' => 'crop.harvests.show',
        'update' => 'crop.harvests.update',
        'destroy' => 'crop.harvests.destroy',
        'create' => 'crop.harvests.create',
        'edit' => 'crop.harvests.edit'
    ]);
Route::patch('crops/{id}/harvest', [App\Http\Controllers\Crop\CropController::class, 'markAsHarvested'])->name('crops.markAsHarvested');
Route::resource('crop/crops', App\Http\Controllers\Crop\CropController::class)
    ->names([
        'index' => 'crop.crops.index',
        'store' => 'crop.crops.store',
        'show' => 'crop.crops.show',
        'update' => 'crop.crops.update',
        'destroy' => 'crop.crops.destroy',
        'create' => 'crop.crops.create',
        'edit' => 'crop.crops.edit'
    ]);
Route::resource('crop/purchases', App\Http\Controllers\Crop\PurchaseController::class)
    ->names([
        'index' => 'crop.purchases.index',
        'store' => 'crop.purchases.store',
        'show' => 'crop.purchases.show',
        'update' => 'crop.purchases.update',
        'destroy' => 'crop.purchases.destroy',
        'create' => 'crop.purchases.create',
        'edit' => 'crop.purchases.edit'
    ]);
Route::resource('crop/expenses', App\Http\Controllers\Crop\ExpenseController::class)
    ->names([
        'index' => 'crop.expenses.index',
        'store' => 'crop.expenses.store',
        'show' => 'crop.expenses.show',
        'update' => 'crop.expenses.update',
        'destroy' => 'crop.expenses.destroy',
        'create' => 'crop.expenses.create',
        'edit' => 'crop.expenses.edit'
    ]);
Route::resource('crop/stagings', App\Http\Controllers\Crop\StagingController::class)
    ->names([
        'index' => 'crop.stagings.index',
        'store' => 'crop.stagings.store',
        'show' => 'crop.stagings.show',
        'update' => 'crop.stagings.update',
        'destroy' => 'crop.stagings.destroy',
        'create' => 'crop.stagings.create',
        'edit' => 'crop.stagings.edit'
    ]);