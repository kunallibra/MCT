<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
          'name'    => 'Kunal',
          'email'    => 'kp@mct.com.au',
          'password'   =>  Hash::make('password'),
          'remember_token' =>  str_random(10),
      ]);
    }
}
