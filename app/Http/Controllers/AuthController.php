<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginView() {
        // dd(Auth::user());
        return inertia("auth/login");
    }

    public function registerView() {
        return inertia("auth/register");
    }

    public function login(Request $request) {
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

    public function logout(Request $request) : RedirectResponse {
        Auth::logout();
 
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();

        return to_route("login.get");
    }
}
