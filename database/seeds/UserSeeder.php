<?php

use Illuminate\Database\Seeder;
use App\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Admin',
        	'email' => 'admin@app.com',
        	'password' => Hash::make('password'),
         'mobile' =>'01834959645',
         'address' =>'Dhaka',
         'user_type' =>'Super_Admin',
         'delatable' => 1,
        	'status' => 0
        ]);
    }
}
