<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class frutas_seed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i =0; $i<= 20; $i++){
            \DB::table('frutas')->insert(array(
               'nombre'=> "cereza".$i,
               'descripcion'=> "Descripción de la fruta".$i,
               'precio'=> $i,
               'fecha'=> date('y-m-d')
            ));
            
            $this->command->info('la tabla de frutas ha sido actualizada');
        }
    }
}
