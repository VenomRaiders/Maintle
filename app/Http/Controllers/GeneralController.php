<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class GeneralController extends Controller
{
    public function home(){
        return Inertia::render('Home');
    }

    public function script_writers(){
        $script_writers = User::allVerifiedScriptWriters();
        return Inertia::render('ScriptWriters', ['scriptWriters' => $script_writers, 'okay'=> 'okay']);
    }
}
