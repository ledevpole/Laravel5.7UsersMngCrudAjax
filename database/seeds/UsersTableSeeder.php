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
    	if(! DB::table('users')->where('email', '=' ,'admin@ledevpole.com')->get())
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
