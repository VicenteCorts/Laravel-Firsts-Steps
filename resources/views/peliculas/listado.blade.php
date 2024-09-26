<h1>{{$titulo}}</h1>
<h2>{{$listado[2]}}</h2>
<p>{{date('Y')}}</p>


<!--Comentario HTML-->

<?php   // Comentario PHP ?>

{{-- Comentario BLADE --}}

<!-- Comprobar si existe una variable -->
<?= isset($variable) ? $variable : 'No hay varaible'; ?>
{{ $variable ?? 'No hay variable'}}