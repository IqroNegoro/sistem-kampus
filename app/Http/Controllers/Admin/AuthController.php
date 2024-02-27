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
            "email" => "required|email|string",
            "password" => "required|string"
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            return to_route("index");
        }

        return back()->with("error", "Email or Password not match");
    }

    public function register(Request $request) : RedirectResponse {
        $data = $request->validate([
            "name" => "required|string",
            "email" => "required|email|string",
            "password" => "required|string",
            "confirm" => "required|same:password"
        ]);

        if (User::create($data)) {
            return to_route("login.get")->with("success", "Register success");
        };

        return to_route("register.get")->with("error", "Something wrong, try again");
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
        if (Auth::guard("admin")->check()) $guard = "admin";
        if (Auth::guard("student")->check()) $guard = "student";
        if (Auth::guard("lecturer")->check()) $guard = "lecturer";

        Auth::logout();
 
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();

        if ($guard === 'admin') return to_route("login.get");
        if ($guard === 'student') return to_route("login.student.get");
        if ($guard === 'lecturer') return to_route("login.lecturer.get");
    }
}
