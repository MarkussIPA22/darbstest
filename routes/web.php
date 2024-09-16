<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\UserController;

Route::get('/', [WeatherController::class, 'index']);
Route::get('/users', [UserController::class, 'index']); // Fetch all users

Route::post('/save_user', [UserController::class, 'store']);
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}/edit', [UserController::class, 'edit']);
Route::put('/update_user/{id}', [UserController::class, 'update']);
Route::delete('/delete_user/{id}', [UserController::class, 'deleteUser']);