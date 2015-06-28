<?php

use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder {
	public function run()
	{
    	DB::table('users')->delete();
    	User::create(array(
        	'username' => 'admin',
        	'password' => Hash::make('admin'),
        	'fullname' => 'Administrator',
        	'createddate' => date("Y-m-d"),
        	'updateddate' => date("Y-m-d"),
    	));
	}
}