<?php

use Illuminate\Support\Facades\Route;


Route::resource('/inventory', App\Http\Controllers\InventoryController::class);
Route::prefix('inventory')->group(function(){
    Route::get('/', [App\Http\Controllers\InventoryController::class, 'index']);
    Route::get('/{code}', [App\Http\Controllers\InventoryController::class, 'show']);
    Route::post('/', [App\Http\Controllers\InventoryController::class, 'store']);
    Route::put('/', [App\Http\Controllers\InventoryController::class, 'update']);
});

Route::resource('/chatbox', App\Http\Controllers\ChatboxController::class);