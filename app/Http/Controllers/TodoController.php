<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index() {
        // Fetch all todos from database using traditional way / Eloquent Way
        return Todo::limit(5)->get();
    }

    public function create() {
        return view('todos.create');
    }

    public function store(Request $request) {
        return $request;
    }
}
