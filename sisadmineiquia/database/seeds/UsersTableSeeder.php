<?php

use Illuminate\Database\Seeder;



class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB:: table('users')->insert(array(
            'name' =>'Administrador',
            'email'=>'admin2@gmail.com',
            'password'=>\Hash::make('admin2'),
            'type'=>'adminsist',
        	));
    }
}
