<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(AdminSeeder::class);

        Model::reguard();
    }
}

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
