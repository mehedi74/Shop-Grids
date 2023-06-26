<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductController;


//all admin routes...

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //all view_by_module routes...
    Route::get('/categories/update/status{id}', [CategoryController::class, 'updateStatus'])->name('categories.update.status');
    Route::resource('/categories', CategoryController::class);

    //all sub-view_by_module routes...
    Route::get('/subcategories/update/status{id}', [SubCategoryController::class, 'updateStatus'])->name('subcat.status.update');
    Route::resource('/subcategories', SubCategoryController::class);

    //all brands routes...
    Route::resource('/brands', BrandController::class);
    Route::get('/brands/update/status{id}', [BrandController::class, 'updateStatus'])->name('brands.update.status');

    //all units routes...
    Route::resource('/units', UnitController::class);
    Route::get('/units/update/status{id}', [UnitController::class, 'updateStatus'])->name('units.update.status');

    //all products routes...
    Route::resource('/products', ProductController::class);
    //realtime make request by ajax to get  products subcategory by clicking view_by_module|| routes...
    Route::get('/product/get-subcategory', [ProductController::class,'getSubCategory'])->name('product.get.subcategory');
    Route::get('/product/update{id}/status', [ProductController::class,'updateStatus'])->name('product.update.status');

});
