<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class IndexController extends Controller
{
    public function index() {
        return inertia("admin/index");
    }
}
