<h1>Listado de frutas</h1>
<h3><a href="{{url('frutas/crear')}}">Crear fruta</a></h3>
<ul>
    @foreach($frutas as $fruta)
        <li>
            <a href="{{ url('frutas/detail', ['id' => $fruta->id] ) }}">
                {{$fruta->nombre}}               
            </a>
        </li>
    @endforeach
</ul>

