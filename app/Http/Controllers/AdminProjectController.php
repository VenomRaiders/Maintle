<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Genre;
use App\Models\Project;
use Illuminate\Validation\Rules\File;

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
            "poster_image" => ['required', File::image()->max(2 * 1024)],
            "project_document" => ['nullable', File::types(['pdf', 'doc', 'docx'])->max(10 * 1024)],
            "logline" => "required",
            "cost" => "required",
            "synopsis" => "required",
            "genre" => "required",
            "lead_cast" => "required",
            "crew" => "required"
        ]);

         $poster_image = $request->file('poster_image');
         $poster_image_name = date('YmdHi').$poster_image->getClientOriginalName();
         $poster_image_url = $poster_image->storeAs('project/images', $poster_image_name, 'public');
        
         $project_document_url = null;

         if($request->has('project_document') && $request->file('project_document') != null){
            $project_document = $request->file('project_document');
            $project_document_name = date('YmdHi').$project_document->getClientOriginalName();
            $project_document_url = $project_document->store($project_document_name, 'projects');
         }

        $project = Project::create([
            "title" => $validated["title"],
            "logline" => $validated["logline"],
            "amount" => $validated["cost"],
            "synopsis" => $validated["synopsis"],
            "lead_cast" => json_encode($validated["lead_cast"]),
            "crew" => json_encode($validated["crew"]),
            "image" => $poster_image_url,
            "document" => $project_document_url
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
