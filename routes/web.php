<?php

use Illuminate\Support\Facades\Route;

Route::get('/verification/{code}', [App\Http\Controllers\WelcomeController::class, 'verification']);
Route::get('/verification/sample/{code}', [App\Http\Controllers\WelcomeController::class, 'sample_verification']);
Route::get('/csf/survey', [App\Http\Controllers\Laboratory\CsfController::class, 'show']);
Route::post('register', [App\Http\Controllers\WelcomeController::class, 'register']);
Route::get('new', [App\Http\Controllers\WelcomeController::class, 'new'])->name('new');

Route::middleware(['2fa','auth','verified'])->group(function () {
    Route::resource('/profile', App\Http\Controllers\User\ProfileController::class);
});

Route::middleware(['2fa','auth','verified','is_active','menu'])->group(function () {
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index']);
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/fetch', [App\Http\Controllers\DashboardController::class, 'fetch']);
    Route::get('/report', [App\Http\Controllers\Laboratory\TsrController::class, 'report']);
    Route::resource('/customers', App\Http\Controllers\Laboratory\CustomerController::class);
    Route::resource('/quotations', App\Http\Controllers\Laboratory\QuotationController::class);
    Route::resource('/quotations2', App\Http\Controllers\Laboratory\Quotation2Controller::class);
    Route::resource('/requests', App\Http\Controllers\Laboratory\TsrController::class);
    Route::resource('/samples', App\Http\Controllers\Laboratory\SampleController::class);
    Route::resource('/analyses', App\Http\Controllers\Laboratory\AnalysisController::class);
    Route::resource('/sampleregister', App\Http\Controllers\Laboratory\SampleRegisterController::class);

    Route::resource('/csf', App\Http\Controllers\Laboratory\CsfController::class);
    Route::resource('/calendar', App\Http\Controllers\Laboratory\CalendarController::class);

    Route::resource('/targets', App\Http\Controllers\Laboratory\TargetController::class);
    Route::resource('/reports', App\Http\Controllers\Laboratory\ReportController::class);

    Route::prefix('insights')->group(function(){
        Route::controller(App\Http\Controllers\Laboratory\InsightController::class)->group(function () {
            Route::get('/','index');
            Route::get('/customers','customers_view');
            Route::get('/laboratories','laboratories_view');
            Route::get('/locations','locations_view');
        });
    });

    Route::resource('/services', App\Http\Controllers\ServiceController::class);
    Route::resource('/inventory', App\Http\Controllers\InventoryController::class);
    Route::resource('/chatbox', App\Http\Controllers\ChatboxController::class);
    Route::resource('/executive', App\Http\Controllers\ExecutiveController::class);

    Route::prefix('lists')->group(function(){
        Route::resource('/laboratories', App\Http\Controllers\Lists\LaboratoryController::class);
        Route::resource('/locations', App\Http\Controllers\Lists\LocationController::class);
        Route::resource('/dropdowns', App\Http\Controllers\Lists\DropdownController::class);
    }); 

    Route::middleware(['finance'])->group(function () {
        Route::resource('/finance', App\Http\Controllers\FinanceController::class);
    });
});

require __DIR__.'/auth.php';
