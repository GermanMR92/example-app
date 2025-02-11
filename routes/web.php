<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', [DashboardController::class, 'index']);

Route::prefix('products')->group(function () {
    // Route::get('/new', [ProductController::class, 'new']);
    Route::post('/store', [ProductController::class, 'store']);
    Route::post('/update/{id}', [ProductController::class, 'update']);
    // Route::get('/edit/{id}', [ProductController::class, 'edit']);
    Route::delete('destroy/{id}', [ProductController::class, 'destroy']);
});
