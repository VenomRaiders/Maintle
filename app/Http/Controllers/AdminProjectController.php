<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Genre;
use App\Models\Project;

class AdminProjectController extends Controller
{
    public function index(){
        return Inertia::render('Admin/Projects', ["tab" => "Projects"]);
    }

    public function add_project() {
        $genres = Genre::all();
        return Inertia::render('Admin/projects/AddProject', ["tab" => "Projects -> New Project", "genres" => $genres]);
    }

    public function store_project(Request $request){
        $validated = $request->validate([
            "title" => "required",
            "logline" => "required",
            "synopsis" => "required",
            "genre" => "required",
            "movie_format" => "required",
            "lead_cast" => "required",
            "crew" => "required"
        ]);

        $project = Project::create([
            "title" => $validated["title"],
            "logline" => $validated["logline"],
            "synopsis" => $validated["synopsis"],
            "movie_format" => $validated["movie_format"],
            "lead_cast" => json_encode($validated["lead_cast"]),
            "crew" => json_encode($validated["crew"])
        ]);

        $project->genres()->attach($validated["genre"]);

        return redirect()->route("admin.projects")->with('message', 'Project added successfully');
    }
}
