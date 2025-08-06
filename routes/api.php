<?php

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MessageController;
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
Route::post("/send-sms", [MessageController::class, 'sendSms'])
    ->name('send.sms');
Route::post("/send-whatsapp", [MessageController::class, 'sendMessageWatsApp'])
    ->name('send.whatsapp'); 
Route::post('/webhook', [MessageController::class, 'handleWebhook'])    
    ->name('webhook.handle'); 
Route::post('/articles', [ArticlesController::class, 'store'])
    ->name('articles.store'); 
Route::get('/articles', [ArticlesController::class, 'index'])
    ->name('articles.index');