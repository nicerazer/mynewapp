<form action="" method="get">
    <input type="text" name="title" placeholder="Search something by title">
    <input type="checkbox" name="sortByAsc">
    <button>Search</button>
</form>

<a href="/todos/create">Create New Todo</a>

@foreach ($todos as $todo)
    {{ $todo->id }}
    <a href="/todos/{{ $todo->id }}">{{ $todo->title }}</a>
@endforeach
