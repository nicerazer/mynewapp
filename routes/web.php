<?php

use App\Http\Controllers\GreetingController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/greetings', [GreetingController::class, 'hello']);

Route::get('/todos', [TodoController::class, 'index']);
Route::get('/todos/create', [TodoController::class, 'create'])->middleware(['auth']);
Route::post('/todos', [TodoController::class, 'store'])->middleware(['auth']);
Route::get('/todos/{todo}', [TodoController::class, 'show']);
Route::get('/todos/{todo}/edit', [TodoController::class, 'edit'])->middleware(['auth']);
Route::put('/todos/{todo}', [TodoController::class, 'update'])->middleware(['auth']);
Route::delete('/todos/{todo}', [TodoController::class, 'destroy'])->middleware(['auth']);

require __DIR__.'/auth.php';
