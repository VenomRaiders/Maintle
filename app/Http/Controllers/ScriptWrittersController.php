<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ScriptWrittersController extends Controller
{
    public function dashboard(){
        return Inertia::render('scriptwriter/Main'); 
    }

    public function add_script(){
        return Inertia::render('scriptwriter/AddScript');
    }

    public function statistics(){
        return Inertia::render('scriptwriter/Statistics');
    }
}
