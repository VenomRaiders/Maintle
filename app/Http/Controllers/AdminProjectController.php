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
        $projects = Project::orderBy('created_at')->with('genres')->get();
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
        $project = Project::find($id)->with('genres')->first();
        if(!$project){
            return redirect()->back()->with("error", "Invalid id provided");
        }

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

    public function add_contribution(Request $request){
        $validated = $request->validate([
            "project_id" => "required",
            "amount" => "required"
        ]);

        $project = Project::find($validated["project_id"]);

        if(!$project){
            return redirect()->back()->with("error", "Invalid project id provided");
        }

        if($project->amount - $validated["amount"] < 0){
            return redirect()->back()->with("error", "Amount to be contributed is more than the project cost");
        }

        $project->contribution = $project->contribution + $validated["amount"];


        $project->save();

        if($project->contribution == $project->amount){
            $project->is_funded = true;
            $project->save();
        }

        return redirect()->route("admin.projects")->with("message", "Contribution added successfully");
    }

    public function mark_project_as_sold(Request $request){
        $validated = $request->validate([
            "project_id" => "required"
        ]);

        $project = Project::find($validated["project_id"]);

        if(!$project){
            return redirect()->back()->with("error", "Invalid project id provided");
        }

        $project->is_funded = true;
        $project->contribution = $project->amount;
        $project->save();

        return redirect()->route("admin.projects")->with("message", "Project marked as sold successfully");
    }
}
