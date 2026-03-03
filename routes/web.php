<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return 'This is your Task Manager Dashboard';
});

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

// form and submission for creating a task
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('tasks.show');
// mark a task complete and optionally set scheduling fields
Route::post('/tasks/{id}/complete', [TaskController::class, 'markComplete'])->name('tasks.complete');
