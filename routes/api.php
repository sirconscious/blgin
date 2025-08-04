<?php

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get("/test", function () {
    return response()->json(['message' => 'API is working']);
}); 
Route::post('/register', [AuthController::class, 'register'])
    ->name('register');  
Route::post('/login', [AuthController::class, 'login'])
    ->name('login');
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])
        ->name('logout'); 
    Route::get('/me', function (Request $request) {
        return response()->json($request->user());
    })->name('me');
});
Route::get('/users', [UserController::class, 'index'])
    ->name('users.index');