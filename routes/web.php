<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Controllers
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ScriptWrittersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [GeneralController::class, 'home'])->name('home');


Route::group(['middleware', 'prefix' => 'admin', 'as'=>'admin.'], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/scriptwriters', [AdminController::class, 'scriptwriters'])->name('scriptwriters');
    Route::get('/projects', [AdminController::class, 'projects'])->name('projects');
    Route::get('/profile', [AdminController::class, 'admin_profile'])->name('admin_profile');
    Route::get('/scriptwriters/all_scripts', [AdminController::class, 'all_scripts'])->name('all_scripts');
    Route::get('/scriptwriters/pending', [AdminController::class, 'scripts_pending'])->name('scripts_pending');
    Route::get('/scriptwriters/approved', [AdminController::class, 'scripts_approved'])->name('scripts_approved');
    Route::get('/scriptwriters/rejected', [AdminController::class, 'scripts_rejected'])->name('scripts_rejected');
});

Route::group(['middleware' => ['auth','verified'], 'prefix' => 'scriptwriter', 'as'=>'scriptwriter.'], function(){
    Route::get("/dashboard", [ScriptWrittersController::class, "dashboard"])->name("dashboard");
    Route::get("/add_script", [ScriptWrittersController::class, "add_script"])->name("add_script");
    Route::post("/add_script", [ScriptWrittersController::class, "save_script"])->name("add_script.posts");
});

Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'investor', 'as' => 'investor.'],function () {
    Route::get('/dashboard', function(){
        return Inertia::render('Investor/Index');
    })->name('dashboard');
});

Route::get('/dashboard', function () {
    if(auth()->user()->role->name == "admin"){
        return redirect()->intended('/admin');
    }else if(auth()->user()->role->name == "investor"){
        return redirect()->intended("/");
    }else{
        return redirect()->intended("/scriptwriter/dashboard");
    }
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
