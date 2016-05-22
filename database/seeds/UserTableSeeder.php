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
            'name'=>'Luis Silva',
            'email'=> 'luis.silva.2708@gmail.com',
            'role'=>'admin',
            'password'=>bcrypt('admin12345')
        ]);
        
    }
}
