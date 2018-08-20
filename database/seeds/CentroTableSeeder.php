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
        $usuario->name='Administrador';
        $usuario->email='administrador1@gmail.com';
        $usuario->password=Hash::make('123456');
        $usuario->adress='Alajuela Costa Rica';
        $usuario->phone='12345678';
        $usuario->save();
        $usuario->tipoUsuario()->attach(1);
        $us = \App\User::where('email',$usuario->email)->first();
        $billetera = new \App\Billeteravirtual;
        $billetera->usuario = $us->id;
        $billetera->cantEcoDisponibles = 0;
        $billetera->cantEcoPorTiquetes = 0;
        $billetera->cantEcoTotal = 0 ;
        $billetera->save();


        $usuario2=new \App\User();
        $usuario2->name='AdministradorCentro';
        $usuario2->email='administradorcentro1@gmail.com';
        $usuario2->password=Hash::make('123456');
        $usuario2->adress='Alajuela Costa Rica';
        $usuario2->phone='12345678';
        $usuario2->save();
        $usuario2->tipoUsuario()->attach(2);
        $us2 = \App\User::where('email',$usuario2->email)->first();
        $billetera2 = new \App\Billeteravirtual;
        $billetera2->usuario = $us2->id;
        $billetera2->cantEcoDisponibles = 0;
        $billetera2->cantEcoPorTiquetes = 0;
        $billetera2->cantEcoTotal = 0 ;
        $billetera2->save();


        $centro = new \App\Centro();
        $centro->nombre = 'Centro de Acopio Alajuela';
        $centro->provincia = 'Alajuela';
        $centro->direccionExacta = '100 metros norte de CityMall';
        $centro->user_id = 2;
        $centro->deleted_at = null;
        $centro->save();

        $centro2 = new \App\Centro();
        $centro2->nombre = 'Centro de Acopio Naranjo';
        $centro2->provincia = 'Alajuela';
        $centro2->direccionExacta = '100 metros norte del estadio de Naranjo';
        $centro2->user_id = 2;
        $centro2->deleted_at = null;
        $centro2->save();


        $centro3 = new \App\Centro();
        $centro3->nombre = 'Centro de Acopio Heredia';
        $centro3->provincia = 'Heredia';
        $centro3->direccionExacta = '100 metros norte de la UNA';
        $centro3->user_id = 2;
        $centro3->deleted_at = null;
        $centro3->save();





    }
}
