<?php

use Illuminate\Database\Seeder;

class ReciboTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recibos')->truncate();
        factory(Auditoria\Recibo::class,101)->create();
    }
}
