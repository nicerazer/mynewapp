<?php

use App\Http\Controllers\GreetingController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/greetings', [GreetingController::class, 'hello']);

Route::get('/todos', [TodoController::class, 'index']);
Route::get('/todos/create', [TodoController::class, 'create']);
Route::post('/todos', [TodoController::class, 'store']);
