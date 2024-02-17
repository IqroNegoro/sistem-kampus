<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lecturers = Lecturer::search()->with(["faculty"])->orderBy("created_at")->paginate(request("rows") ?? 10);
        return inertia("lecturer/index", [
            "lecturers" => $lecturers
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
            "name" => "required|string|max:255",
            "nidn" => "required|numeric",
            "birth_place" => "required|string",
            "birth" => "required|date",
            "address" => "required|string",
            "faculty_id" => "required|string|exists:faculties,id",
            "phone" => "required|numeric",
            "email" => "required|string|email:dns",
            "gender" => "required|string",
            "photo" => "required|image|max:2048" // 2mb
        ]);

        if ($request->hasFile("photo")) {
            $file = $request->file("photo")->store("images", "public");

            $data["photo"] = $file;
        }
        
        Lecturer::create($data);
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
    public function update(Request $request, Lecturer $lecturer)
    {
        $validate = [
            "name" => "required|string|max:255",
            "nidn" => "required|numeric",
            "birth_place" => "required|string",
            "birth" => "required|date",
            "address" => "required|string",
            "faculty_id" => "required|string|exists:faculties,id",
            "phone" => "required|numeric",
            "email" => "required|string|email:dns",
            "gender" => "required|string",
        ];

        if ($request->hasFile("photo")) {
            $validate["photo"] = "required|image|max:2024";
        }

        $data = $request->validate($validate);
        
        if ($request->hasFile("photo")) {
            $file = $request->file("photo")->store("images", "public");
            
            $data["photo"] = $file;
        }

        $lecturer->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lecturer $lecturer)
    {
        $lecturer->delete();
    }

    public function get() {
        return Lecturer::all(["id", "name"]);
    }
}
