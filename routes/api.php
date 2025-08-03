<?php

use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get("/test", function () {
    return response()->json(['message' => 'API is working']);
}); 
Route::post('/register', [UserController::class, 'store'])
    ->name('register'); 
Route::get('/users', [UserController::class, 'index'])
    ->name('users.index');