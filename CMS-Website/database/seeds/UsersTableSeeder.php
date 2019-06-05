<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = User::where('email', 'mosta1598@gmail.com')->first();

      if(!$user){
        User::create([
          'name' => 'Mustafa Sayed',
          'email' => 'goodcoder@yahoo.com',
          'role'=>'admin',
          'password' => Hash::make('password')

        ]);
      }
    }
}
