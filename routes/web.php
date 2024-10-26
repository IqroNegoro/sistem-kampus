<?php

use App\Http\Controllers\Admin\AcademicYearController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BuildingController;
use App\Http\Controllers\Admin\ClassesController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\FacultyController;
use App\Http\Controllers\Admin\LecturerController as AdminLecturerController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use App\Http\Controllers\Admin\StudyController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Lecturer\LecturerController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
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

Route::get('/', function() {
    return to_route("login.get");
})->middleware("auth");

Route::middleware(["guest"])->group(function() {
    // separate login url if want

    // Admins
    Route::get("/login", [AuthController::class, "loginView"])->name("login.get");
    Route::post("/login", [AuthController::class, "login"])->name("login.post");
    
    // Disabled if u want
    Route::get("/register", [AuthController::class, "registerView"])->name("register.get");
    Route::post("/register", [AuthController::class, "register"])->name("register.post");
    
    // Students
    Route::get("/student/login", [AuthController::class, "loginViewStudent"])->name("login.student.get");
    Route::post("/student/login", [AuthController::class, "loginStudent"])->name("login.student.post");
    
    // Lecturers
    Route::get("/lecturer/login", [AuthController::class, "LoginViewLecturer"])->name("login.lecturer.get");
    Route::post("/lecturer/login", [AuthController::class, "loginLecturer"])->name("login.lecturer.post");
});

Route::middleware(["auth:admin"])->prefix("admin")->group(function() {
    Route::get("/", [IndexController::class, "index"])->name("index");
    
    Route::get("/faculties/get", [FacultyController::class, "get"])->name("faculties.get");
    Route::get("/buildings/get", [BuildingController::class, "get"])->name("buildings.get");
    Route::get("/lecturers/get", [AdminLecturerController::class, "get"])->name("lecturers.get");
    Route::get("/studies/get", [StudyController::class, "get"])->name("studies.get");
    Route::get("/classes/get", [ClassesController::class, "get"])->name("classes.get");
    Route::get("/rooms/get", [RoomController::class, "get"])->name("rooms.get");
    Route::get("/courses/get", [CourseController::class, "get"])->name("courses.get");
    Route::get("/years/get", [AcademicYearController::class, "get"])->name("years.get");
    Route::get("/roles/get", [RoleController::class, "get"])->name("roles.get");
    Route::get("/permission/get", [PermissionController::class, "get"])->name("permissions.get");

    Route::resource("/faculties", FacultyController::class);
    Route::resource("/buildings", BuildingController::class);
    Route::resource("/rooms", RoomController::class);
    Route::resource("/years", AcademicYearController::class)->parameter("years", "academic_year");
    Route::resource("/studies", StudyController::class);
    Route::resource("/courses", CourseController::class);
    Route::resource("/classes", ClassesController::class)->parameter("classes", "classes");
    Route::resource("/schedules", ScheduleController::class);
    
    Route::middleware(["role:superadmin"])->group(function() {
        Route::resource('/lecturers', AdminLecturerController::class);
        Route::resource("/students", AdminStudentController::class);
        Route::resource("/roles", RoleController::class);
    });
    
});

Route::middleware(["auth:student"])->prefix("student")->name("student.")->controller(StudentController::class)->group(function() {
    Route::get("/", "index")->name("index");
    Route::put("/", "updateProfile")->name("update.profile");
    Route::get("/schedules", "schedules")->name("schedules");
});

Route::middleware(["auth:lecturer"])->prefix("lecturer")->name("lecturer.")->controller(LecturerController::class)->group(function() {
    Route::get("/", "index")->name("index");
    Route::put("/", "updateProfile")->name("update.profile");
    Route::get("/classes", "classes")->name("classes");
    Route::get("/schedules", "schedules")->name("schedules");
});

Route::delete("/logout", [AuthController::class, "logout"])->name('logout')->middleware("auth:admin,student,lecturer");