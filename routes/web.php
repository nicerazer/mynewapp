<?php

use App\Http\Controllers\GreetingController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('todos', TodoController::class)
->only(['index', 'create'])
->middleware(['auth']);

Route::resource('todos', TodoController::class)
->except(['index', 'create'])
->middleware(['auth']);


require __DIR__.'/auth.php';
