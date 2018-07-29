<?php

use Illuminate\Database\Seeder;

class CentroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $usuario=new \App\User();
        $usuario->name='Administrador1';
        $usuario->email='administrador1@gmail.com';
        $usuario->password=Hash::make('123456');
        $usuario->adress='Alajuela Costa Rica';
        $usuario->phone='12345678';
        $usuario->tipousuario_id=1;
        $usuario->save();

        $usuario=new \App\User();
        $usuario->name='AdministradorCentro1';
        $usuario->email='administradorcentro1@gmail.com';
        $usuario->password=Hash::make('123456');
        $usuario->adress='Alajuela Costa Rica';
        $usuario->phone='12345678';
        $usuario->tipousuario_id=2;
        $usuario->save();
    }
}
