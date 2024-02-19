<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Response;

class AuthController extends Controller
{
    public function loginView() : Response {
        return inertia("auth/login");
    }

    public function registerView() : Response {
        return inertia("auth/register");
    }

    public function login(Request $request) : RedirectResponse {
        $credentials = $request->validate([
            "email" => "required|email:dns|string",
            "password" => "required|string"
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            return to_route("lecturers.index");
        }

        return back()->with("error", "Email or Password not match");
    }

    public function register(Request $request) : RedirectResponse {
        $data = $request->validate([
            "email" => "required|email:dns|string",
            "password" => "required|string",
            "confirm" => "required|same:password"
        ]);

        $data["name"] = "Admin";
        $data["roles"] = "superadmin";

        User::create($data);

        return to_route("login.get");
    }

    public function loginViewStudent() : Response {
        return inertia("auth/student/login");
    }

    public function loginStudent(Request $request) : RedirectResponse {
        $credentials = $request->validate([
            "email" => "required|email:dns|string",
            "password" => "required|string"
        ]);

        if (Auth::guard("student")->attempt($credentials)) {
            $request->session()->regenerate();
            
            return to_route("student.index");
        }

        return back()->with("error", "Email or Password not match");
    }

    public function loginViewLecturer() : Response {
        return inertia("auth/lecturer/login");
    }

    public function loginLecturer(Request $request) : RedirectResponse {
        $credentials = $request->validate([
            "email" => "required|email:dns|string",
            "password" => "required|string"
        ]);

        if (Auth::guard("lecturer")->attempt($credentials)) {
            $request->session()->regenerate();
            
            return to_route("lecturer.index");
        }

        return back()->with("error", "Email or Password not match");
    }

    public function logout(Request $request) : RedirectResponse {
        Auth::logout();
 
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();

        return to_route("login.get");
    }
}
