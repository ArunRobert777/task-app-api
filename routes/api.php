<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\WorkspaceController;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::controller(AuthController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::resource('tasks', TaskController::class)
    ->except(['create', 'show'])
    ->middleware('auth:sanctum');

Route::post('workspace/create', [WorkspaceController::class, 'create'])
    ->middleware('auth:sanctum')
    ->name('workspace.create');
