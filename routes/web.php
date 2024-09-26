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