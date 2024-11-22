<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
Use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/projects', [ProjectController::class, 'index'])->name('project.index');
Route::post('/projects', [ProjectController::class, 'store'])->name('project.store');
Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('project.update');

Route::post('/tasks', [TaskController::class, 'store'])->name('task.store');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('task.update');
