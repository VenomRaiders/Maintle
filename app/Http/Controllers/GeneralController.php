<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\ScriptCollection;
use App\Models\Project;

class GeneralController extends Controller
{
    public function home(){
        return Inertia::render('Home');
    }

    public function scripts(){
        $scripts = ScriptCollection::where('is_bought',0)->orderBy('created_at', 'desc')->get();
        return Inertia::render('Scripts',['scripts' => $scripts]);
    }

    public function script_details($id){
        $admin_contact = env('ADMIN_CONTACT');
        $script = ScriptCollection::find($id);
        $genres = $script->genres;
        $sub_genres = $script->subGenres;

        return Inertia::render('ScriptDetails', ['script' => $script,'admin_contact' => $admin_contact]);
    }

    public function projects() {
        $projects = Project::all();
        return Inertia::render('Projects', ['projects' => $projects]);
    }

    public function project_details($id) {
        $project = Project::find($id)->with('genres')->first();
        if(!$project){
            return redirect()->back()->with("error", "Invalid id provided");
        }
        
        $admin_contact = env('ADMIN_CONTACT');
        return Inertia::render('ProjectDetails', ['project' => $project,'admin_contact' => $admin_contact]);
    }

    public function about_us() {
        return Inertia::render('About');
    }

    public function blog() {
        return Inertia::render('Blog');
    }
}
