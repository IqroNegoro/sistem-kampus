<?php

use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudyController;
use Illuminate\Support\Facades\Route;

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
    Route::resource("/faculties", FacultyController::class);
    Route::resource("/buildings", BuildingController::class);
    Route::resource("/rooms", RoomController::class);
    Route::resource("/years", AcademicYearController::class)->parameter("years", "academic_year");
    Route::resource("/studies", StudyController::class);
    Route::resource("/courses", CourseController::class);
    Route::resource("/students", StudentController::class);
    Route::resource("/classes", ClassesController::class)->parameter("classes", "classes");
    Route::resource("/schedules", ScheduleController::class);
});