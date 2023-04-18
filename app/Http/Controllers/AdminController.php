<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function dashboard() {
        return Inertia::render('Admin/Main', ["tab" => "Admin Dashboard"]);
    }

    public function scriptwriters() {
        return Inertia::render('Admin/Scriptwriters', ["tab" => "ScriptWriters"]);
    }

    public function all_scripts() {
        return Inertia::render('Admin/scriptwriters/AllScripts', ["tab" => "ScriptWriters"]);
    }

    public function scripts_pending() {
        return Inertia::render('Admin/scriptwriters/Pending', ["tab" => "ScriptWriters"]);
    }

    public function scripts_approved() {
        return Inertia::render('Admin/scriptwriters/Approved', ["tab" => "ScriptWriters"]);
    }

    public function scripts_rejected() {
        return Inertia::render('Admin/scriptwriters/Rejected', ["tab" => "ScriptWriters"]);
    }

    public function projects() {
        return Inertia::render('Admin/Projects', ["tab" => "Projects"]);
    }

    public function catalog() {
        return Inertia::render('Admin/Catalog', ["tab" => "Catalogs and Summary"]);
    }

    public function admin_profile() {
        return Inertia::render('Admin/Profile', ["tab" => "My Profile"]);
    }
}