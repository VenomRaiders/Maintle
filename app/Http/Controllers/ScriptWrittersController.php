<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;

class ScriptWrittersController extends Controller
{
    public function dashboard(){
        return Inertia::render('scriptwriter/Main'); 
    }

    public function add_script(){
        return Inertia::render('scriptwriter/AddScript');
    }

    public function save_script(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'post_image' => ['required', File::image()->max(2 * 1024)], // max image size set to 2mb
            'logline' => 'required',
            'Synopsis' => 'required',
            'type' => 'required',
            'main_genre' => 'required',
            'sub_genre' => 'required',
            'cast_size' => 'required',
            'location' => 'required',
        ]);

        // upload poster image
        $poster_image = $request->file('post_image');
        $poster_image_name = date('YmdHi').$poster_image->getClientOriginalName();
        $poster_image_url = $poster_image->storeAs('poster_images', $poster_image_name, 'public');

        // TODO:handle lead roles saving

        auth()->user()->scriptCollection()->create([
            'script_title' => $validated['title'],
            'poster_image' => $poster_image_url,
            'script_tagline' => $validated['logline'],
            'script_synopsis' => $validated['Synopsis'],
            'script_genre' => $validated['type'],
            'script_sub_genre' => $validated['main_genre'],
            'script_target_audience' => $validated['sub_genre'],
            'script_suggested_cast' => $validated['cast_size'],
            'script_no_locations' => $validated['location'],
        ]);
    }

    public function statistics(){
        return Inertia::render('scriptwriter/Statistics');
    }
}
