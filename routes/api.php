<?php

use App\Http\Controllers\BuildingController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\LecturerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/faculties", [FacultyController::class, "get"]);
Route::get("/buildings", [BuildingController::class, "get"]);
Route::get("/lecturers", [LecturerController::class, "get"]);