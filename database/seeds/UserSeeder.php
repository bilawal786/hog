<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'name' => 'Admin 01',
                'email' => 'admin01@heartofgold.com',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
                'created_at'=>'2022-05-17 05:48:18',
                'updated_at'=>'2022-05-17 05:48:18'
            ],
            [
                'first_name' => 'user',
                'last_name' => 'user',
                'name' => 'User 01',
                'email' => 'user01@heartofgold.com',
                'password' => Hash::make("12345678"),
                'role' => 'user',
                'created_at'=>'2022-05-17 05:48:18',
                'updated_at'=>'2022-05-17 05:48:18'
            ]
        ]);
    }
}
