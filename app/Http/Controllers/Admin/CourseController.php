<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::search()->with("study")->orderBy("created_at")->paginate(10);
        return inertia("admin/course/index", [
            "courses" => $courses
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
            "name" => "required|string",
            "code" => "required|string|unique:courses",
            "sks" => "required|numeric",
            "semester" => "required|numeric",
            "study_id" => "required|exists:studies,id"
        ]);

        Course::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            "name" => "required|string",
            "code" => "required|string" . ($request->code !== $course->code ? '|unique:courses' : ''),
            "sks" => "required|numeric",
            "semester" => "required|numeric",
            "study_id" => "required|exists:studies,id"
        ]);

        $course->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
    }

    public function get() {
        return Course::all(["id", "name"]);
    }
}
