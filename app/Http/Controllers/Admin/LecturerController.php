<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ActivateAccount;
use Illuminate\Support\Facades\Mail;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lecturers = Lecturer::search()->with(["faculty"])->orderBy("created_at")->paginate(request("rows") ?? 10);
        return inertia("admin/lecturer/index", [
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
            "phone" => "required|numeric|regex:/^\d+$/i",
            "email" => "required|string|email:dns|unique:lecturers",
            "gender" => "required|string",
            "photo" => "required|image|max:2048" // 2mb
        ]);

        if ($request->hasFile("photo")) {
            $file = $request->file("photo")->store("images", "public");

            $data["photo"] = $file;
        }
       
        $data["pass"] = Str::password(6, true, true, false, false);
        $data["password"] = Hash::make($data['pass']);

        Lecturer::create($data);

        Mail::to($data['email'])->send(new ActivateAccount($data));
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
            "phone" => "required|numeric|regex:/^\d+$/i",
            "email" => "required|string|email:dns" . ($request->email !== $lecturer->email ? "|unique:lecturers" : ""),
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
