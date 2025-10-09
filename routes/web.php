<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\ToDoListController;

Route::get('/todo-list/table-view/excel', [ToDoListController::class, 'tableView']);

require __DIR__.'/auth.php';
