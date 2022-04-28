<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TodoController extends Controller
{
    public function index(Request $request) {
        // Fetch all todos from database using traditional way / Eloquent Way

        // Add in query clause
        $todos = Todo::where('user_id', auth()->id())
            ->where('title', 'like', "%{$request->query('title')}%");

        if ($request->query('sortByAsc')) {
            $todos = $todos->orderBy('title');
        }

        $todos = $todos->latest()->limit(5)->get();
        return view('todos.index', compact('todos'));
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
            'img_path' => Str::replace(
                'public', 'storage',
                $request->file('img_file')->store('public/images')
            ), // public/images/img-id12010101.jpg
            'user_id' => auth()->id(),
        ]);

        // Redirect
        return redirect('/todos');
    }

    public function show(Todo $todo) {
        $this->authorize('view', $todo);
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
        $todo = Todo::find($id);
        if (auth()->id() !== $todo->user_id)
            abort(403);
        $todo->destroy();

        return redirect('/todos');
    }
}
