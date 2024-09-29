<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //ESTE ES EL OBJETO DB PARA QUE FUNCIONEN LAS TAREAS DE BBDD

class FrutaController extends Controller {

    public function index() {
        $frutas = DB::table('frutas')
                ->orderBy('id', 'desc')
                ->get(); //SELECT * FROM frutas

        return view('fruta.index', [
            'frutas' => $frutas
        ]); //Vista en la que listaremos nuestro contenido
    }

    public function detail($id) {
        $fruta = DB::table('frutas')->where('id', '=', $id)->first();

        return view('fruta.detail', [
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
        return redirect('/frutas')->with('status', 'Fruta creada correctamente');
    }

    public function delete($id) {
        $fruta = DB::table('frutas')->where('id', $id)->delete();
        return redirect('/frutas')->with('status', 'Fruta borrada correctamente');
    }

    public function edit($id) {
        //Sacar el registro de la BBDD
        $fruta = DB::table('frutas')->where('id', $id)->first();

//        var_dump($fruta);
//        die();
        //Pasar a la vista el objeto y rellenar el formulario
        return view('fruta.create', [
            'fruta' => $fruta
        ]);
    }

    public function update(Request $request) {
        $id = $request->input('id');
        $fecha = date('Y-m-d');
        $fruta = DB::table('frutas')
                ->where('id', $id)
                ->update(array(
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'precio' => $request->input('precio'),
            'fecha' => $fecha
        ));

        //Redirección para despues de guardar las frutas
        return redirect('/frutas')->with('status', 'Fruta actualizada correctamente');
    }
}
