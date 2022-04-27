<h1>{{ $todo['id'] }}</h1>
<p>{{ $todo['title'] }}</p>
<img src="{{ asset("storage/images/{$todo['img_path']}") }}" alt="Epic image">
