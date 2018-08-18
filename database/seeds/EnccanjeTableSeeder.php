<?php

use Illuminate\Database\Seeder;

class EnccanjeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $encabezado = new \App\Enccanje;
        $encabezado->usuario_id = 3;
        $encabezado->centro_id = 1;
        $encabezado->fecha='2018-08-15';
        $encabezado->total=20;
        $encabezado->save();
    }
}
