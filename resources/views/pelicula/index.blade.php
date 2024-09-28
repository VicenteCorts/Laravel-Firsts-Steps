<h1>{{$titulo}}</h1>
<p>(acción index del controlador PeliculaController)</p>

@if(isset($pagina))
<h3> La página es: {{$pagina}}</h3>
@endif

<a href="{{ url('/detalle') }}">Ir al detalle</a>
<a href="{{ url('/detalle' , ['year'=> 2019]) }}">Ir al detalle/2019</a>