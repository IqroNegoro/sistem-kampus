<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia("student/index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function schedules()
    {
        $schedules = Schedule::search()->with(["study", "academicYear", "classes", "course", "lecturer", "room.building"])->orderBy("created_at")->paginate(request("rows") ?? 10);
        return inertia("student/schedule", [
            "schedules" => $schedules
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateProfile(Request $request)
    {
        $validate = [
            "birth_place" => "required|string",
            "birth" => "required|date",
            "address" => "required|string",
            "phone" => "required|numeric|regex:/^\d+$/i",
            "email" => "required|string|email:dns"  . ($request->email !== $request->user()->email ? "|unique:students" : ""),
        ];
        
        if ($request->hasFile("photo")) {
            $validate["photo"] = "image|max:2024";
        }
        
        $data = $request->validate($validate);

        if ($request->hasFile("photo")) {
            $file = $request->file("photo")->store("images", "public");
            
            $data["photo"] = $file;
        }

        $request->user()->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
