<ul>
@foreach ($food['pizza'] as $pizza)
    <li>{{ ucfirst(\Illuminate\Support\Str::lower($pizza)) }}</li>
@endforeach
</ul>
