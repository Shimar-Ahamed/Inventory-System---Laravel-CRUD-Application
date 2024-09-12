<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;


Route::get('/', function () {
    return view('welcome');
});

// Resource routes for items (CRUD operations)
Route::resource('items', ItemController::class);
