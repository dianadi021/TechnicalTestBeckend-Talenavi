<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\ToDoListController;

// Route::prefix('v1')->middleware(['auth:sanctum'])->group(function () {
// });

// Route::middleware('auth:sanctum')->group(function () {
    Route::middleware(['api'])->group(function () {
        Route::prefix('v1')->group(function () {
            Route::resource('/todo-list', ToDoListController::class);
            Route::get('/todo-list/export/excel', [ToDoListController::class, 'getExportExcel']);
            Route::get('/chart/todo-list', [ToDoListController::class, 'getChartData']);
        });
    });
// });
