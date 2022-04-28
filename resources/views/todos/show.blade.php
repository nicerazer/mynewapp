<h1>{{ $todo['id'] }}</h1>
<a href="/todos/{{ $todo->id }}/edit">{{ $todo->title }}</a>
<img src="{{ asset($todo['img_path']) }}" alt="Epic image">
