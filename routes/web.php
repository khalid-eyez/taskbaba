<?php

use App\Http\Controllers\AuthController as AuthManager;
use App\Http\Controllers\TaskController as TaskManager;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthManager::class, 'loginform'])->name('login');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');
Route::get('/register', function () {
    return view('register');
});

Route::post('/login', [AuthManager::class, 'login'])->name('loginprocess');
Route::post('/register', [AuthManager::class, 'register'])->name('registration');
Route::middleware('auth')->group(function () {
    Route::get('/tasks', [TaskManager::class, 'index'])->name('tasks');
    Route::get('/tasks/add', [TaskManager::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [TaskManager::class, 'store'])->name('tasks.store');
    Route::get('/tasks/{task}/edit', [TaskManager::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{task}/update', [TaskManager::class, 'update'])->name('tasks.update');
    Route::put('/tasks/{id}', [TaskManager::class, 'updateStatus'])->name('tasks.updateStatus');
    Route::delete('/tasks/{id}', [TaskManager::class, 'destroy'])->name('tasks.delete');
});
