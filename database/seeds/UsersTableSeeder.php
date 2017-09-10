<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert(array(
         0 => array(
             'id' =>1,
             'name' => '出题老师',
             'email' => '185429135@qq.com',
             'password' => encrypt('111111'),
             'is_admin' => 'yes',
             'created_at' => Carbon::now(),
         )
       ));
    }
}
