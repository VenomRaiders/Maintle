<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Genre;
use App\Models\ScriptCollection;

class ScriptWrittersController extends Controller
{
    public function dashboard(){
        $scripts = auth()->user()->scripts()->with('genres')->get(); // get all scripts for the logged in user
        return Inertia::render('scriptwriter/Main', ["scripts" => $scripts]); 
    }

    public function add_script(){
        $genres = Genre::all();
        return Inertia::render('scriptwriter/AddScript', ["genres" => $genres]);
    }

    public function save_script(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'posterImage' => ['required', File::image()->max(2 * 1024)], // max image size set to 2mb
            'logline' => 'required',
            'synopsis' => 'required',
            'scriptDocument' => ['required', File::types(['pdf', 'doc', 'docx'])->max(10 * 1024)], // max file size set to 10mb
            'mainGenre' => 'required',
            'subGenre' => 'required',
            'castSize' => 'required',
            'location' => 'required',
            'copyright' => 'any|json',
            'movie_format' => 'required',
            'target_audience' => 'required',
            'motivation' => 'required',
            'relevance' => 'required',
            'story_origin' => 'required',
            'leadRoles' => 'required',
        ]);

        // upload poster image
        $poster_image = $request->file('posterImage');
        $poster_image_name = date('YmdHi').$poster_image->getClientOriginalName();
        $poster_image_url = $poster_image->storeAs('script/images', $poster_image_name, 'public');

        // upload script document
        $script_document = $request->file('scriptDocument');
        $script_document_name = date('YmdHi').$script_document->getClientOriginalName();
        $script_document_url = $script_document->store($script_document_name, 'scripts');

        $script =  auth()->user()->scripts()->create([
            'script_title' => $validated['title'],
            'poster_image' => $poster_image_url,
            'script_logline' => $validated['logline'],
            'script_synopsis' => $validated['synopsis'],
            'document_url' => $script_document_url,
            'script_cast_size' => $validated['castSize'],
            'script_no_locations' => $validated['location'],
            'movie_format' => $validated['movie_format'],
            'target_audience' => $validated['target_audience'],
            'motivation' => $validated['motivation'],
            'relevance' => $validated['relevance'],
            'story_origin' => $validated['story_origin'],
            'script_lead_roles' => json_encode($validated['leadRoles'])
        ]);

        if($request->has('copyright')){
            $script->update([
                'copyright' => $validated['copyright']
            ]);
        }

        $script->genres()->attach($validated['mainGenre']);
        $script->subGenres()->attach($validated['subGenre']);

        return redirect()->route('scriptwriter.dashboard')->with('message', 'Script added successfully');
    }

    public function statistics(){
        return Inertia::render('scriptwriter/Statistics');
    }
}
