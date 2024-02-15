<?php

use App\Http\Controllers\BuildingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\FacultiesController;
use App\Http\Controllers\LecturerController;

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

Route::middleware([])->group(function() {
    Route::get('/', [IndexController::class, "index"]);
    Route::resource('/lecturers', LecturerController::class);
    Route::resource("/faculties", FacultiesController::class);
    Route::resource("/buildings", BuildingController::class);
});