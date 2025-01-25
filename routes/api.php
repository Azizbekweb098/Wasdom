<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Notifactions\HabarController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Text\TextController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;







Route::post('login', [AuthController::class, 'login']);
Route::post('contact', [ContactController::class, 'store']);
Route::get('texts', [FrontController::class, 'text']);

Route::middleware(['auth:sanctum'])->group( function () {
  
    
    Route::apiResource('text', TextController::class);
    
    

    Route::get('contacts', [FrontController::class, 'contacts']);
    Route::get('contacts/{id}', [FrontController::class, 'show']);
    Route::delete('contacts/{id}', [FrontController::class, 'delete']);

Route::get('habar', [HabarController::class, 'index']);
Route::get('habar/{id}', [HabarController::class, 'show']);
Route::delete('habar/{id}', [HabarController::class, 'delete']);

Route::put('user', [ProfileController::class, 'userUpdate']);

Route::patch('userPassword', [ProfileController::class, 'userPassword']);
});