<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TodoController extends Controller
{
    public function index() {
        // Fetch all todos from database using traditional way / Eloquent Way
        $todos =  Todo::where('user_id', auth()->id())->latest()->limit(5)->get();
        return view('todos.index', ['todos' => $todos]);
    }

    public function create() {
        return view('todos.create');
    }

    public function store(StoreTodoRequest $request) {
        $validated = $request->validated();

        // Store image!
        $todo = new Todo();
        $todo->title = $validated['title'];
        $todo->is_complete = $request['is_complete'] ? 1 : 0;
        // $todo->img_path = $request->file('img_file')->store('public');
        $storage_path = $request->file('img_file')->store('public/images');
        $public_path = Str::replace('public', 'storage', $storage_path);
        $todo->img_path = $public_path;

        $todo->user_id = auth()->id();

        $todo->save();

        return redirect('/todos');
    }

    public function show($id) {
        $this->authorize('view');

        $todo = Todo::find($id);

        return view('todos.show', ['todo' => $todo]);
    }

    public function edit($id) {
        $this->authorize('update');

        $todo = Todo::find($id);

        return view('todos.edit', ['todo' => $todo]);
    }

    public function update(Request $request, $id) {
        $this->authorize('update');

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
        $this->authorize('delete');

        Todo::destroy($id);

        return redirect('/todos');
    }
}
