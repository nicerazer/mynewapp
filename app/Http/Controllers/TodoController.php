<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index() {
        // Fetch all todos from database using traditional way / Eloquent Way
        return Todo::limit(5)->latest()->get();
    }

    public function create() {
        return view('todos.create');
    }

    public function store(Request $request) {
        // Create model
        // Fill data
        // Save
        Todo::create([
            'title' => $request['title'],
            'is_complete' => $request['is_complete'] ? 1 : 0,
            'img_url' => 'https://images.unsplash.com/photo-1650912460907-0b…fHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80',
            'user_id' => 1
        ]);

        // Redirect
        return redirect('/todos');
    }

    public function show($id) {
        $todo = Todo::find($id);
        return view('todos.show', ['todo' => $todo]);
    }

    public function edit($id) {
        $todo = Todo::find($id);
        return view('todos.edit', ['todo' => $todo]);
    }

    public function update(Request $request, $id) {
        // Find
        $todo = Todo::find($id);
        // Edit
        $todo->title = $request['title'];
        $todo->is_complete = $request['is_complete'] ? 1 : 0;
        // Save
        $todo->save();
        // Redirect
        return redirect("/todos/{$id}");
    }

    public function destroy($id) {
        Todo::destroy($id);

        return redirect('/todos');
    }
}
