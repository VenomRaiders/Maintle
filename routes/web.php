<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Controllers
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ScriptWrittersController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\AdminProjectController;

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
Route::get('/scripts/{id}', [GeneralController::class, 'script_details'])->name('script_details');
Route::get('/projects', [GeneralController::class, 'projects'])->name('projects');
Route::get('/about_us', [GeneralController::class, 'about_us'])->name('about_us');
Route::get('/blog', [GeneralController::class, 'blog'])->name('blog');


Route::post('/scripts/buy', [TransactionsController::class, 'buy_Script'])->name('buy_script')->middleware(['auth', 'verified', 'is_investor']);
Route::get('/payment/callback', [TransactionsController::class, 'payment_callback'])->name('payment_callback')->middleware(['auth', 'verified']);

Route::get('/un', [AdminController::class, 'unverified_users_scripts'])->name('unverified_users_scripts');

Route::group(['middleware' => ['auth','is_admin'], 'prefix' => 'admin', 'as'=>'admin.'], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/scriptwriters', [AdminController::class, 'scriptwriters'])->name('scriptwriters');

    Route::get('/projects', [AdminProjectController::class, 'index'])->name('projects');
    Route::get('/projects/{id}/view', [AdminProjectController::class, 'view_project'])->name('project.view');
    Route::get("/projects/add_project", [AdminProjectController::class, "add_project"])->name("add_project");
    Route::get('/projects/{id}/edit', [AdminProjectController::class, 'edit_project'])->name('project.edit');
    Route::put('/projects/{id}/edit', [AdminProjectController::class, 'update_project'])->name('project.edit.put');
    Route::delete('/projects/{id}/delete', [AdminProjectController::class, 'delete'])->name('project.delete');
    Route::put('/project/add_contribution', [AdminProjectController::class, 'add_contribution'])->name('project.add_contribution');
    Route::put('/project/mark_as_sold',[AdminProjectController::class, 'mark_project_as_sold'])->name('project.mark_as_sold');

    Route::get('/scriptwriters/all_scripts', [AdminController::class, 'all_scripts'])->name('all_scripts');
    Route::get('/scriptwriters/pending', [AdminController::class, 'scripts_pending'])->name('scripts_pending');
    Route::get('/scriptwriters/approved', [AdminController::class, 'scripts_approved'])->name('scripts_approved');
    route::post('/scriptwriters/approve_script', [AdminController::class, 'approve_script'])->name('approve_script');
    route::post('/scriptwriters/reject_script', [AdminController::class, 'reject_script'])->name('reject_script');

    Route::post("/project/add_project", [AdminProjectController::class, "store_project"])->name("store_project");
    Route::get('/profile', [AdminController::class, 'admin_profile'])->name('admin_profile');
});

Route::group(['middleware' => ['auth','verified','is_verified_script_writter'], 'prefix' => 'scriptwriter', 'as'=>'scriptwriter.'], function(){
    Route::get("/dashboard", [ScriptWrittersController::class, "dashboard"])->name("dashboard");
    Route::get("/add_script", [ScriptWrittersController::class, "add_script"])->name("add_script");
});

Route::post("scriptwriter/add_script", [ScriptWrittersController::class, "save_script"])->name("add_script.posts")->middleware(['auth','verified']);

Route::get("/scriptwriter/first_script", [ScriptWrittersController::class, "first_script"])->middleware(['auth','verified'])->name("first_script");

// Investors only routes
Route::group(['middleware' => ['auth', 'verified','is_investor'], 'prefix' => 'investor', 'as' => 'investor.'],function () {
    Route::get('/dashboard', function(){
        return Inertia::render('Investor/Index');
    })->name('dashboard');
});

Route::get('/dashboard', function () {
    if(auth()->user()->is_admin()){
        return redirect()->route('admin.dashboard');
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
