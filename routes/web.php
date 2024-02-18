<?php

use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\AuthController;
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

Route::middleware(["guest"])->group(function() {
    Route::get("/login", [AuthController::class, "loginView"])->name("login.get");
    Route::post("/login", [AuthController::class, "login"])->name("login.post");
    Route::get("/register", [AuthController::class, "registerView"])->name("register.get");
    Route::post("/register", [AuthController::class, "register"])->name("register.post");
});

Route::middleware(["auth"])->group(function() {
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

    Route::delete("/logout", [AuthController::class, "logout"])->name('logout');
});