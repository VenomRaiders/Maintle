<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\ScriptCollection;

class GeneralController extends Controller
{
    public function home(){
        return Inertia::render('Home');
    }

    public function scripts(){
        $scripts = ScriptCollection::where('is_bought',0)->orderBy('created_at', 'desc')->get();
        return Inertia::render('Scripts',['scripts' => $scripts]);
    }

    public function script_writers(){
        $script_writers = User::allVerifiedScriptWriters();
        return Inertia::render('ScriptWriters', ['scriptWriters' => $script_writers, 'okay'=> 'okay']);
    }
}
