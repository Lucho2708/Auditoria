<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        factory(Auditoria\User::class)-> create([
            'name'=>'Luis Eduardo Silva Rodriguez',
            'email'=> 'luis.silva.2708@funman.com',
            'role'=>'0',
            'password'=>bcrypt('admin')

        ]);
        factory(Auditoria\User::class, 99)->create();
    }
}
