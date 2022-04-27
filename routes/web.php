<?php

use App\Http\Controllers\GreetingController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/greetings', [GreetingController::class, 'hello']);

Route::get('/todos', [TodoController::class, 'index']);
Route::get('/todos/create', [TodoController::class, 'create']);
Route::post('/todos', [TodoController::class, 'store']);
Route::get('/todos/{todo}', [TodoController::class, 'show']);
Route::get('/todos/{todo}/edit', [TodoController::class, 'edit']);
Route::put('/todos/{todo}', [TodoController::class, 'update']);
Route::delete('/todos/{todo}', [TodoController::class, 'destroy']);
