<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->where('email', '=' ,'god@ledevpole.com')->get();
        if(!$user->contains('isGodBlessed', 1))
        {
            DB::table('users')->insert([
            'name' => 'GOD',
            'email' => 'god@ledevpole.com',
            'password' => bcrypt('secret'),
            'admin' => 1,
            'isGodBlessed' => 1
            ]);
        }

        $user = DB::table('users')->where('email', '=' ,'admin@ledevpole.com')->get();
        if(!$user->contains('admin', 1))
        {
            DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@ledevpole.com',
            'password' => bcrypt('secret'),
            'admin' => 1
            ]);
        }
         	
        factory(App\User::class, 50)->create();
    }
}
