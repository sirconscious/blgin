<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request; // Changed from Illuminate\Http\Client\Request
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

Route::get('/', function () {
    return view('welcome');
});
Route::get("/auth/google/redirect", function () {
    return Socialite::driver('google')->redirect();
});
Route::get(
    "/auth/google/callback",
    function (Request $request) {
        // dd($request->all());
        $google_user = Socialite::driver('google')->user();
        $user =   User::UpdateOrCreate(
            ['google_id' => $google_user->id],
            [
                'name' => $google_user->name,
                "email" => $google_user->email,
                'password' => bcrypt(Str::random(12)), // Generate a random password
            ]
        );
        // Auth::login($user); // Log in the user 
        $token = $user->createToken('auth-token')->plainTextToken;

        $frontendUrl = env('FRONTEND_URL', 'http://localhost:5173/');
        return redirect($frontendUrl . 'dashboard?token=' . $token);
        // dd($user);
        // // Here you can handle the user information, like saving it to the database
        // return redirect('/')->with('success', 'Logged in as ' . $user->name);


    }

);

Route::get('/auth/redirect', function () {

    return Socialite::driver('github')->redirect();
});
Route::get('/auth/callback', function () {
    try {
        $githubUser = Socialite::driver('github')->stateless()->user();

        // Check if a user with this email exists
        $user = User::where('email', $githubUser->email)->first();

        if ($user) {
            // Update only github_id if not set
            if (!$user->github_id) {
                $user->github_id = $githubUser->id;
                $user->save();
            }
        } else {
            // Create new user
            $user = User::create([
                'name' => $githubUser->name ?? $githubUser->nickname,
                'email' => $githubUser->email,
                'github_id' => $githubUser->id,
                'password' => bcrypt(Str::random(12)),
            ]);
        }

        $token = $user->createToken('auth-token')->plainTextToken;
        $frontendUrl = env('FRONTEND_URL', 'http://localhost:5173/');
        return redirect($frontendUrl . 'dashboard?token=' . $token);
    } catch (\Exception $e) {
        dd($e->getMessage());
    }
});