<h1>Listado de frutas</h1>
<ul>
    @foreach($frutas as $fruta)
        <li>
            <a href="{{ url('/detail', ['id' => $fruta->id] ) }}">
                {{$fruta->nombre}}               
            </a>
        </li>
    @endforeach
</ul>

