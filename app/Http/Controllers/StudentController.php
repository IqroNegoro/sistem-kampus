<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with(["study", "class"])->orderBy("created_at")->paginate(10);
        return inertia("student/index", [
            "students" => $students
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
            "nim" => "required|numeric",
            "birth_place" => "required|string",
            "birth" => "required|date",
            "address" => "required|string",
            "study_id" => "required|string|exists:studies,id",
            "class_id" => "required|string|exists:class,id",
            "phone" => "required|numeric",
            "email" => "required|string|email:dns",
            "gender" => "required|string",
            "photo" => "required|image|max:2048" // 2mb
        ]);

        if ($request->hasFile("photo")) {
            $file = $request->file("photo")->store("images", "public");

            $data["photo"] = $file;
        }

        Student::create($data);
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
    public function update(Request $request, Student $student)
    {
        $validate = [
            "name" => "required|string|max:255",
            "nim" => "required|numeric",
            "birth_place" => "required|string",
            "birth" => "required|date",
            "address" => "required|string",
            "study_id" => "required|string|exists:studies,id",
            "class_id" => "required|string|exists:class,id",
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

        $student->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
    }
}
