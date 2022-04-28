<form action="/todos/{{ $todo['id'] }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{ $todo['title'] }}">
    <input type="checkbox" name="is_complete" value="on" {{ $todo['is_complete'] ? 'checked': '' }}>
    <input type="file" name="img_file">
    {{-- Controller notes --}}
    {{-- Delete old file --}}
    {{-- Upload new file --}}
    <button>Update this todo</button>
</form>

<form action="/todos/{{ $todo['id'] }}" method="POST" id="deleteTodoForm">
    @csrf
    @method('DELETE')
    <button>Delete!!!!</button>
</form>
