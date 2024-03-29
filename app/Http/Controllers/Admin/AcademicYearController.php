<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    public function __construct() {
        $this->authorizeResource(AcademicYear::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $years = AcademicYear::search()->orderBy("created_at")->paginate(request("rows") ?? 10);
        return inertia("admin/year/index", [
            "years" => $years
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
            "year" => "required|numeric",
            "semester" => "required|string",
            "status" => "nullable|boolean"
        ]);

        AcademicYear::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(AcademicYear $academicYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AcademicYear $academicYear)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AcademicYear $academicYear)
    {
        $data = $request->validate([
            "year" => "required|numeric",
            "semester" => "required|string",
            "status" => "nullable|boolean"
        ]);

        $academicYear->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AcademicYear $academicYear)
    {
        $academicYear->delete();
    }
    
    public function get() {
        return AcademicYear::all(["id", "year", "semester"]);
    }
}
