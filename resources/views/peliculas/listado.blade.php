<!--Imprimir por pantalla-->
<h1>{{$titulo}}</h1>
<h2>{{$listado[2]}}</h2>
<p>{{date('Y')}}</p>


<!--Comentarios-->
<!--Comentario HTML-->
<?php// Comentario PHP ?>
{{-- Comentario BLADE --}}


<!-- Comprobar si existe una variable -->
<?= isset($variable) ? $variable : 'No hay varaible'; ?>
{{ $variable ?? 'No hay variable'}}


<!--Condicionales-->
@if($titulo && count($listado)>=2)
    <h1>La variable existe: {{$titulo}} y el listado es mayor o igual a 5</h1>
@elseif($titulo)
    <h1>titulo existe pero listado no es mayor qe 5</h1>
@else
    <h1>El título no existe</h1>
@endif

<!-- Bucles -->
@for($i=1; $i<=20; $i++)
El número es: {{$i}} </br>
@endfor

<hr/>

<?php $contador = 1 ?>
@while($contador <50)
    @if($contador % 2 == 0)
        NUMERO PAR: {{$contador}} <br/>
    @endif
    <?php $contador++; ?>
@endwhile

<hr/>

@foreach ($listado as $pelicula)
    <p>{{$pelicula}}</p>
@endforeach


<!-- Includes en las vistas -->
@include('includes.header')
@include('includes.footer')

<!-- Plantillas base o Layout -->