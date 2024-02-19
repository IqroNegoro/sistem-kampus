<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return ($request->expectsJson() ? null : Auth::guard("admin")) ? route('login.get') : (Auth::guard("student") ? route('login.student.get') : route("login.lecturer.get"));
    }
}
