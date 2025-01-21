<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Notifactions\HabarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;





Route::post('login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group( function () {
Route::get('habar', [HabarController::class, 'index']);
});