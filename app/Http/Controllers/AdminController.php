<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function dashboard() {
        return Inertia::render('Admin/Main');
    }

    public function scriptwriters() {
        return Inertia::render('Admin/Main');
    }

    public function projects() {
        return Inertia::render('Admin/Main');
    }

    public function catalog() {
        return Inertia::render('Admin/Main');
    }

    public function admin_profile() {
        return Inertia::render('Admin/Main');
    }
}