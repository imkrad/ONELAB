<?php

use Illuminate\Support\Facades\Route;

Route::get('/verification/{code}', [App\Http\Controllers\WelcomeController::class, 'verification']);
Route::get('/csf/survey', [App\Http\Controllers\Laboratory\CsfController::class, 'show']);
Route::post('register', [App\Http\Controllers\WelcomeController::class, 'register']);
Route::get('new', [App\Http\Controllers\WelcomeController::class, 'new'])->name('new');

Route::middleware(['2fa','auth','verified'])->group(function () {
    Route::resource('/profile', App\Http\Controllers\User\ProfileController::class);
});

Route::middleware(['2fa','auth','verified','is_active','menu'])->group(function () {
    Route::get('/', [App\Http\Controllers\Laboratory\DashboardController::class, 'index']);
    Route::get('/dashboard', [App\Http\Controllers\Laboratory\DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/customers', App\Http\Controllers\Laboratory\CustomerController::class);
    Route::resource('/quotations', App\Http\Controllers\Laboratory\QuotationController::class);
    Route::resource('/requests', App\Http\Controllers\Laboratory\TsrController::class);
    Route::resource('/samples', App\Http\Controllers\Laboratory\SampleController::class);
    Route::resource('/analyses', App\Http\Controllers\Laboratory\AnalysisController::class);
    Route::resource('/csf', App\Http\Controllers\Laboratory\CsfController::class);

    Route::prefix('insights')->group(function(){
        Route::controller(App\Http\Controllers\Laboratory\InsightController::class)->group(function () {
            Route::get('/','index');
            Route::get('/customers','customers_view');
            Route::get('/laboratories','laboratories_view');
        });
    });

    Route::prefix('services')->group(function(){
        Route::resource('/testservices', App\Http\Controllers\Laboratory\TestserviceController::class);
        Route::resource('/import', App\Http\Controllers\Laboratory\ImportController::class);
    }); 
});

require __DIR__.'/auth.php';
require __DIR__.'/utility.php';
require __DIR__.'/inventory.php';
require __DIR__.'/finance.php';
