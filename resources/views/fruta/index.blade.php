<h1>Listado de frutas</h1>
<h3><a href="{{url('frutas/crear')}}">Crear fruta</a></h3>

@if(session('status'))
<p style="background: greenyellow;">{{session('status')}}</p>
@endif

<ul>
    @foreach($frutas as $fruta)
        <li>
            <a href="{{ url('frutas/detail', ['id' => $fruta->id] ) }}">
                {{$fruta->nombre}}               
            </a>
        </li>
    @endforeach
</ul>

