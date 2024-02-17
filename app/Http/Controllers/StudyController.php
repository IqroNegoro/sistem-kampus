<?php

namespace App\Http\Controllers;

use App\Models\Study;
use Illuminate\Http\Request;

class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studies = Study::search()->with(["faculty", "lecturer"])->orderBy("created_at")->paginate(10);
        return inertia("study/index", [
            "studies" => $studies
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
            "study_code" => "required|string|unique:studies",
            "name" => "required|string",
            "semester" => "required|numeric",
            "faculty_id" => "required|exists:faculties,id",
            "lecturer_id" => "required|exists:lecturers,id"
        ]);

        Study::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Study $study)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Study $study)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Study $study)
    {
        $data = $request->validate([
            "study_code" => "required|string" . ($request->study_code !== $study->study_code ? '|unique:studies' : ''),
            "name" => "required|string",
            "semester" => "required|numeric",
            "faculty_id" => "required|exists:faculties,id",
            "lecturer_id" => "required|exists:lecturers,id"
        ]);

        $study->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Study $study)
    {
        $study->delete();
    }

    public function get() {
        return Study::all(["id", "name"]);
    }
}
