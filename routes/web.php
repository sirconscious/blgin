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
Route::get("/auth/google/redirect" , function () {
    return Socialite::driver('google')->redirect();
});
Route::get("/auth/google/callback" , function (Request $request) { 
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
});