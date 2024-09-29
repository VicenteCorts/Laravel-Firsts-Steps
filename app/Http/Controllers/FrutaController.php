<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //ESTE ES EL OBJETO DB PARA QUE FUNCIONEN LAS TAREAS DE BBDD

class FrutaController extends Controller
{
    public function index() {
        $frutas = DB::table('frutas')
                ->orderBy('id','desc')
                ->get(); //SELECT * FROM frutas

        return view('fruta.index', [
            'frutas'=> $frutas
        ]); //Vista en la que listaremos nuestro contenido
    }
    
    public function detail($id) {
       $fruta = DB:: table('frutas')->where('id', '=', $id)->first();
 
       return view('fruta.detail',[
           'fruta' => $fruta
       ]);
    }
    
    public function crear() {
        return view('fruta.create');
    }
    
    public function save(Request $request) {
        $fecha = date('Y-m-d');
        $fruta = DB::table('frutas')->insert(array(
           'nombre' => $request->input('nombre'), 
           'descripcion' => $request->input('descripcion'), 
           'precio' => $request->input('precio'),
           'fecha' => $fecha
        ));
        
        //Redirección para despues de guardar las frutas
        return redirect('/frutas');
    }
}
