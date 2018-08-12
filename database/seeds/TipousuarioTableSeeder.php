<?php

use Illuminate\Database\Seeder;

class TipousuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tusuario= new \App\tipousuario();
        $tusuario->nombre = 'Administrador';
        $tusuario->permissions = json_encode(['create-ct' => true,'create-cp' => true]);
        $tusuario->save();

        $tusuario= new \App\Tipousuario();
        $tusuario->nombre = 'Administrador Centro Acopio';
        $tusuario->save();

        $tusuario= new \App\Tipousuario();
        $tusuario->nombre = 'Cliente';
        $tusuario->save();
    }
}
