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
            'name' =>'JW'  ,
            'email'=>'rogelwilliam@gmail.com',
            'password'=>\Hash::make('secret'),
            'type'=>'adminsist',
        	));
    }
}
