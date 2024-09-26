<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo "<h1>Hola mundo</h1>";
});

Route::get('/mostrar-fecha', function () {
    $titulo = "Estoy mostrando la fecha";
    return view('mostrar-fecha', array(
'titulo' => $titulo
    ));
});

Route::get('/pelicula/{titulo}/{year?}', function ($titulo = 'No hay película seleccionada', $year = 2024) {
    return view('pelicula', array(
'titulo' => $titulo,
 'year' => $year
    ));
})->where(array(
    'titulo' => '[a-zA-Z]+',
    'year' => '[0-9]+'
));

Route::get('/listado-peliculas', function () { //Nombre de la url, no tiene porque ser como la ruta
    $titulo = "Listado de Películas";
    $listado = array('Batman', 'Spiderman', 'Gran Torino');
    
//    return view('peliculas.listado', array(
//        'titulo' => $titulo
//    ));

    return view('peliculas.listado') //Carpeta.Archivo
            ->with('listado', $listado) //Parámetros adicionales con método 'with'
            ->with('titulo', $titulo);  //Parámetros adicionales con método 'with'
});
