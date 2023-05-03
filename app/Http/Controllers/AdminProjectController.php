<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Genre;
use App\Models\Project;

class AdminProjectController extends Controller
{
    public function index(){
        $projects = Project::orderBy('created_at')->get();
        return Inertia::render('Admin/Projects', ["tab" => "Projects", "projects" => $projects]);
    }

    public function add_project() {
        $genres = Genre::all();
        return Inertia::render('Admin/projects/AddProject', ["genres" => $genres]);
    }

    public function store_project(Request $request){
        $validated = $request->validate([
            "title" => "required",
            "logline" => "required",
            "cost" => "required",
            "synopsis" => "required",
            "genre" => "required",
            "lead_cast" => "required",
            "crew" => "required"
        ]);

        $project = Project::create([
            "title" => $validated["title"],
            "logline" => $validated["logline"],
            "amount" => $validated["cost"],
            "synopsis" => $validated["synopsis"],
            "lead_cast" => json_encode($validated["lead_cast"]),
            "crew" => json_encode($validated["crew"])
        ]);

        $project->genres()->attach($validated["genre"]);

        return redirect()->route("admin.projects")->with('message', 'Project added successfully');
    }

    public function view_project(Request $request, $id){
        $project = Project::find($id);
        // if(!$project){
        //     return redirect()->back()->with("error", "Invalid id provided");
        // }

        // Todo: return the page to view the project
        return Inertia::render('Admin/projects/ViewProject', ["project" => $project, "tab" => "Projects -> Detailed View"]);
    }

    public function edit_project(Request $request, $id){
        $project = Project::find($id);
        if(!$project){
            return redirect()->back()->with("error", "Invalid id provided");
        }

        $genres = Genre::all();

        // Todo: return the page to edit
    }

    public function update_project(Request $request, $id){
        $project = Project::find($id);
        if(!$project){
            return redirect()->back()->with("error", "Invalid id provided");
        }

        $validated = $request->validate([
            "title" => "required",
            "logline" => "required",
            "synopsis" => "required",
            "genre" => "required",
            "movie_format" => "required",
            "lead_cast" => "required",
            "crew" => "required"
        ]);

        $pr = $project->update([
            "title" => $validated["title"],
            "logline" => $validated["logline"],
            "synopsis" => $validated["synopsis"],
            "movie_format" => $validated["movie_format"],
            "lead_cast" => json_encode($validated["lead_cast"]),
            "crew" => json_encode($validated["crew"])
        ]);

        $pr->genres()->sync($validated["genre"]);

        return redirect()->route("admin.projects")->with("message", 'Project added successfully');
    }

    public function delete($id){
        $project = Project::find($id);
        if(!$project){
            return redirect()->back()->with("error", "Invalid id provided");
        }

        $project->delete();

        return redirect()->route("admin.projects")->with("message", "Project successfully deleted");
    }
}
