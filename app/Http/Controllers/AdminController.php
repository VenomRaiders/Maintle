<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Genre;

use App\Models\ScriptCollection;
use App\Models\Role;

class AdminController extends Controller
{
    public function dashboard() {
        $stats = [];
        $stats['total_scripts'] = ScriptCollection::all()->count();
        $stats['total_investors'] = Role::where('name', 'investor')->first()->users->count();
        $stats['scripts_pending_approval'] = count(ScriptCollection::unverifiedScripts());

        $scripts_needing_approval = ScriptCollection::unverifiedScripts();
        
        return Inertia::render('Admin/Main', ['stats' => $stats, 'scripts_needing_approval' => $scripts_needing_approval]);
    }

    public function scriptwriters() {
        $scripts = ScriptCollection::orderBy('created_at')->with('genres')->get();
        return Inertia::render('Admin/scriptwriters/AllScripts', ["tab" => "ScriptWriters", "scripts" => $scripts]);
    }

    public function all_scripts() {
        $scripts = ScriptCollection::orderBy('created_at')->get();
        return Inertia::render('Admin/scriptwriters/AllScripts', ["tab" => "ScriptWriters", "scripts" => $scripts]);
    }

    public function scripts_pending() {
        $scripts_needing_approval = ScriptCollection::unverifiedScripts();
        return Inertia::render('Admin/scriptwriters/Pending', ["tab" => "ScriptWriters", "scripts_needing_approval" => $scripts_needing_approval]);
    }

    public function scripts_approved() {
        $approved_scripts = ScriptCollection::approvedScripts();
        return Inertia::render('Admin/scriptwriters/Approved', ["tab" => "ScriptWriters", "approved_scripts" => $approved_scripts]);
    }

    public function admin_profile() {
        return Inertia::render('Admin/Profile', ["tab" => "My Profile"]);
    }

    public function unverified_users_scripts() {
        $scripts = ScriptCollection::unverifiedScripts();
        dd($scripts);
    }

    public function approve_Script(Request $request){
        $request->validate([
            'script_id' => 'required|integer',
        ]);

        $script = ScriptCollection::find($request->script_id);
        $user = $script->user;

        $user->scriptWriter->is_verified = true;
        $user->scriptWriter->save();

        //TODO: send email notification to user

        return redirect()->route('admin.scripts_approved');
    }

    public function reject_script(Request $request){
        $request->validate([
            'script_id' => 'required|integer',
        ]);

        $script = ScriptCollection::find($request->script_id);
        $user = $script->user;

        $script->delete();

        //TODO: send email notification to user

        return redirect()->route('admin.all_scripts');
    }
    
}