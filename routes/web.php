<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    echo "<h1>Hola mundo</h1>";
    
//    try {
//        \DB::connection()->getPDO();
//        echo \DB::connection()->getDatabaseName();
//        } catch (\Exception $e) {
//        echo 'None';
//    }
    
});

Route::get('/peliculas/{pagina?}', [PeliculaController::class, 'index']);

Route::get('/detalle/{year?}', [PeliculaController::class, 'detalle'])
        ->middleware(App\Http\Middleware\TestYear::class);

Route::get('/redirigir', [PeliculaController::class, 'redirigir']);

Route::get('/formulario', [PeliculaController::class, 'formulario']);

Route::post('/recibir', [PeliculaController::class, 'recibir']);

//CLASE 337
Route::resource('usuario', UsuarioController::class);
















/*

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

Route::get('/pagina-generica', function(){
   
    return view('pagina');
    
});
 */
