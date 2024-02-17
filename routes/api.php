<?php

use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\StudyController;
use App\Models\AcademicYear;
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

Route::get("/faculties", [FacultyController::class, "get"])->name("faculties.get");
Route::get("/buildings", [BuildingController::class, "get"])->name("buildings.get");
Route::get("/lecturers", [LecturerController::class, "get"])->name("lecturers.get");
Route::get("/studies", [StudyController::class, "get"])->name("studies.get");
Route::get("/classes", [ClassesController::class, "get"])->name("classes.get");
Route::get("/rooms", [RoomController::class, "get"])->name("rooms.get");
Route::get("/courses", [CourseController::class, "get"])->name("courses.get");
Route::get("/years", [AcademicYearController::class, "get"])->name("years.get");