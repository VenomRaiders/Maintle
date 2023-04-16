<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Controllers
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ScriptWrittersController;

use App\Models\User;

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
Route::get('/scripts', [GeneralController::class, 'scripts'])->name('scripts');
Route::get('/scriptwriters', [GeneralController::class, 'script_writers'])->name('script_writters')->middleware(['auth', 'verified']);


Route::group(['middleware', 'prefix' => 'admin', 'as'=>'admin.'], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/scriptwriters', [AdminController::class, 'scriptwriters'])->name('scriptwriters');
    Route::get('/projects', [AdminController::class, 'projects'])->name('projects');
    Route::get('/catalog', [AdminController::class, 'catalog'])->name('catalog');
    Route::get('/profile', [AdminController::class, 'admin_profile'])->name('admin_profile');
});

Route::group(['middleware' => ['auth','verified'], 'prefix' => 'scriptwriter', 'as'=>'scriptwriter.'], function(){
    Route::get("/dashboard", [ScriptWrittersController::class, "dashboard"])->name("dashboard");
    Route::get("/add_script", [ScriptWrittersController::class, "add_script"])->name("add_script");
    Route::post("/add_script", [ScriptWrittersController::class, "save_script"])->name("add_script.posts");
    Route::get("/statistics", [ScriptWrittersController::class, "statistics"])->name("statistics");
});

// Investors only routes
Route::group(['middleware' => ['auth', 'verified','is_investor'], 'prefix' => 'investor', 'as' => 'investor.'],function () {
    Route::get('/dashboard', function(){
        return Inertia::render('Investor/Index');
    })->name('dashboard');
});

Route::get('/dashboard', function () {
    if(auth()->user()->is_admin()){
        return redirect()->intended('/admin');
    }else if(auth()->user()->is_investor()){
        return redirect()->intended("/investor/dashboard");
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
