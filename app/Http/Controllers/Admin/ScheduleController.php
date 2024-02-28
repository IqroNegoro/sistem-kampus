<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function __construct() {
        $this->authorizeResource(Schedule::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::search()->with(["study", "academicYear", "classes", "course", "lecturer", "room.building"])->orderBy("created_at")->paginate(request("rows") ?? 10);
        return inertia("admin/schedule/index", [
            "schedules" => $schedules
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "day" => "required",
            "time" => "required",
            "study_id" => "required|uuid|exists:studies,id",
            "year_id" => "required|uuid|exists:academic_years,id",
            "class_id" => "required|uuid|exists:class,id",
            "course_id" => "required|uuid|exists:courses,id",
            "lecturer_id" => "required|uuid|exists:lecturers,id",
            "room_id" => "required|uuid|exists:rooms,id"
        ]);

        Schedule::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        $data = $request->validate([
            "day" => "required",
            "time" => "required",
            "study_id" => "required|uuid|exists:studies,id",
            "year_id" => "required|uuid|exists:academic_years,id",
            "class_id" => "required|uuid|exists:class,id",
            "course_id" => "required|uuid|exists:courses,id",
            "lecturer_id" => "required|uuid|exists:lecturers,id",
            "room_id" => "required|uuid|exists:rooms,id"
        ]);

        $schedule->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
    }
}
