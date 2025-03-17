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

@php
    $isActive = true;
    $hasError = true;
@endphp

<span @class([
    'p-4',
    'font-bold' => $isActive,
    'text-gray-500' => ! $isActive,
    'bg-red' => $hasError,
])></span>

<span class="p-4 text-gray-500 bg-red">Salom</span>


<x-accordion>
    <x-accordion.item>
        К счастью, Blade позволяет вам размещать файл, соответствующий имени каталога компонента, в самом каталоге компонента.
        Когда этот шаблон существует, он может быть отображен как «корневой» элемент компонента, даже если он вложен в каталог.
        Таким образом, мы можем продолжать использовать тот же синтаксис Blade, который приведен в примере выше;
        однако мы скорректируем нашу структуру каталогов следующим образом:
    </x-accordion.item>
</x-accordion>
