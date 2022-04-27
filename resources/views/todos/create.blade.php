<form action="/todos" method="POST">
    @csrf
    <input type="text" name="title">
    <input type="checkbox" name="is_complete" value="on">
    <input type="file" name="img_file">
    <button>Submit</button>
</form>
