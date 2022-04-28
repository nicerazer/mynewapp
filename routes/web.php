<?php

use App\Http\Controllers\GreetingController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/greetings', [GreetingController::class, 'hello']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Is user logged in?
// Can user access?
Route::resource('todos', TodoController::class)->middleware('auth');
// 1. uri (entrypoint)
// 2. middleware (middle layer checking or anything)
// 3. controller (database access is here)


require __DIR__.'/auth.php';
