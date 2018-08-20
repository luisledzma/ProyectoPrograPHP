<?php

use Illuminate\Database\Seeder;

class ConsecutivoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $consecutivo = new \App\Consecutivo;
        $consecutivo->consecutivo = 1;
        $consecutivo->nombre = 'Canje';
        $consecutivo->save();
    }
}
