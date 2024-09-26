<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo "<h1>Hola mundo</h1>";
});

Route::get('/mostrar-fecha', function(){
    $titulo = "Estoy mostrando la fecha";
    return view('mostrar-fecha', array(
        'titulo' => $titulo
    ));
});

Route::get('/pelicula/{titulo}/{year?}', function ($titulo = 'No hay película seleccionada', $year = 2024){
    return view('pelicula', array(
        'titulo' => $titulo,
        'year' => $year
    ));
})->where(array(
    'titulo'=> '[a-zA-Z]+',
    'year'=> '[0-9]+'
));