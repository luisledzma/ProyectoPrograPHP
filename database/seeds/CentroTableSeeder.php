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
        //
        $usuario=new \App\User();
        $usuario->name='Administrador1';
        $usuario->email='administrador1@gmail.com';
        $usuario->password=Hash::make('123456');
        $usuario->adress='Alajuela Costa Rica';
        $usuario->phone='12345678';
        $usuario->save();
        $usuario->tipoUsuario()->attach(1);


        $usuario2=new \App\User();
        $usuario2->name='AdministradorCentro1';
        $usuario2->email='administradorcentro1@gmail.com';
        $usuario2->password=Hash::make('123456');
        $usuario2->adress='Alajuela Costa Rica';
        $usuario2->phone='12345678';
        $usuario2->save();
        $usuario2->tipoUsuario()->attach(2);

    }
}
