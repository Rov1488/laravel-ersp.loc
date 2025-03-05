<h1>Laravel</h1>

@unless (Auth::check())
    You are not signed in.
@endunless

@php
    $name = 'John Doe';
    $array = ['name' => 'John Doe', 'age' => 30];
    //$records = 2;
 @endphp
Hello, @{{ $name }}.
<br>
<button type="button" onclick="document.getElementById('demo').innerHTML = Date()">Click to get datetime</button>
<p id="demo"></p>
<script>
    let app = {{ Js::from($array) }};
    //console.log(app);
    document.write(app.name);
</script>

@if (count($records) === 1)
   <br> I have one record!
@elseif (count($records) > 1)
    <br> I have multiple records!
@else
    <br> I don't have any records!
@endif
