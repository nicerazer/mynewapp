<form action="/todos" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="title">
    <input type="checkbox" name="is_complete" value="true">
    <input type="file" name="img_file">
    <button>Submit</button>
</form>
