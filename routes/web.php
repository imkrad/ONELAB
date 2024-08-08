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
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index']);
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/customers', App\Http\Controllers\Laboratory\CustomerController::class);
    Route::resource('/quotations', App\Http\Controllers\Laboratory\QuotationController::class);
    Route::resource('/requests', App\Http\Controllers\Laboratory\TsrController::class);
    Route::resource('/samples', App\Http\Controllers\Laboratory\SampleController::class);
    Route::resource('/analyses', App\Http\Controllers\Laboratory\AnalysisController::class);
    Route::resource('/csf', App\Http\Controllers\Laboratory\CsfController::class);
    Route::resource('/calendar', App\Http\Controllers\Laboratory\CalendarController::class);
    Route::resource('/targets', App\Http\Controllers\Laboratory\TargetController::class);

    Route::prefix('insights')->group(function(){
        Route::controller(App\Http\Controllers\Laboratory\InsightController::class)->group(function () {
            Route::get('/','index');
            Route::get('/customers','customers_view');
            Route::get('/laboratories','laboratories_view');
        });
    });

    Route::resource('/services', App\Http\Controllers\ServiceController::class);
    Route::resource('/finance', App\Http\Controllers\FinanceController::class);
    Route::resource('/inventory', App\Http\Controllers\InventoryController::class);
    Route::resource('/chatbox', App\Http\Controllers\ChatboxController::class);
    Route::resource('/executive', App\Http\Controllers\ExecutiveController::class);
});

require __DIR__.'/auth.php';
