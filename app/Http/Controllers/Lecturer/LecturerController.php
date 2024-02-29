<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use App\Models\Classes;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::where("lecturer_id", Auth::user()->id)->search()->with(["study", "academicYear", "classes", "course", "lecturer", "room.building"])->orderBy("created_at")->paginate(request("rows") ?? 10);
        return inertia("lecturer/index", [
            "schedules" => $schedules
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function schedules()
    {
        $schedules = Schedule::where("lecturer_id", Auth::user()->id)->search()->with(["study", "academicYear", "classes", "course", "lecturer", "room.building"])->orderBy("created_at")->paginate(request("rows") ?? 10);
        return inertia("lecturer/schedule", [
            "schedules" => $schedules
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function classes()
    {
        $class = Classes::where('lecturer_id', Auth::user()->id)->search()->with(["study", "lecturer"])->orderBy("created_at")->paginate(request("rows") ?? 10);
        return inertia("lecturer/classes", [
            "classes" => $class
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lecturer $lecturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lecturer $lecturer)
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
            "email" => "required|string|email:dns"  . ($request->email !== $request->user()->email ? "|unique:lecturers" : ""),
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
    public function destroy(Lecturer $lecturer)
    {
        //
    }
}
