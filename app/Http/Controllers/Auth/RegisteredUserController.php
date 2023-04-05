<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Validation\Rules\File;
use Carbon\Carbon;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create_scriptwritter(): Response
    {
        return Inertia::render('Auth/RegisterScriptWritter');
    }

    public function create_investor(): Response
    {
        return Inertia::render('Auth/RegisterInvestor');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store_scriptwritter(Request $request): RedirectResponse
    {
        $request->validate([
            'profile_picture' => ['required', File::image()->max(1024)],
            'username' => 'required|string|max:255',
            'date_of_birth' => 'required|date|before:today',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'phone_number' => 'required|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'city' => 'required|string|max:100',
            'gender' => 'required|string|in:male,female',
            'bio' => 'required|string'
        ]);

        $profile_image_url = $request->file('profile_picture')->store('images/profiles','public');

        $user_role = Role::where("name", "user")->first();

        $user = $user_role->users()->create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_pic_url' => $profile_image_url
        ]);

        // calculate age from the provided date of birth
        $age = Carbon::parse($request->date_of_birth)->age;

        $user->scriptWriter()->create([
            'date_of_birth' => $request->date_of_birth,
            'age' => $age,
            'city' => $request->city,
            'gender' => $request->gender,
            'bio' => $request->bio
        ]);

        event(new Registered($user));

        Auth::login($user);

        // TODO: redirect to investor dashboard when done
        return redirect()->route('scriptwriter.dashboard')->with("message", "Account created successfully. Please check your email account to verify your account"); 
    }

    public function store_investor(Request $request){
        $request->validate([
            'profile_picture' => ['required', File::image()->max(1024)],
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'phone_number' => 'required|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ]);

        $profile_image_url = $request->file('profile_picture')->store('images/profiles','public');

        $user_role = Role::where("name", "investor")->first();

        $user = $user_role->users()->create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_pic_url' => $profile_image_url
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('scriptwriter.dashboard')->with("message", "Account created successfully. Please check your email account to verify your account"); 
    }
}
