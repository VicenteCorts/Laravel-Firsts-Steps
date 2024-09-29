<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //ESTE ES EL OBJETO DB PARA QUE FUNCIONEN LAS TAREAS DE BBDD

class FrutaController extends Controller
{
    public function index() {
        $frutas = DB::table('frutas')->get(); //SELECT * FROM frutas

        return view('fruta.index', [
            'frutas'=> $frutas
        ]); //Vista en la que listaremos nuestro contenido
    }
    
    public function detail() {
        
    }
}
