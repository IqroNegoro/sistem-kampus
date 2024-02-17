<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $class = Classes::search()->with(["study", "lecturer"])->orderBy("created_at")->paginate(10);
        return inertia("classes/index", [
            "classes" => $class
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
            "generation" => "required|numeric",
            "total" => "numeric",
            "study_id" => "required|exists:studies,id",
            "lecturer_id" => "required|exists:lecturers,id"
        ]);

        Classes::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Classes $classes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classes $classes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classes $classes)
    {
        $data = $request->validate([
            "name" => "required|string",
            "generation" => "required|numeric",
            "total" => "numeric",
            "study_id" => "required|exists:studies,id",
            "lecturer_id" => "required|exists:lecturers,id"
        ]);

        $classes->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classes $classes)
    {
        $classes->delete();
    }

    public function get() {
        return Classes::all(["id", "name"]);
    }
}
