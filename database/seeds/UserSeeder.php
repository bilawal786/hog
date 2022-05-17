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
                'name' => 'Default User',
                'email' => 'du@codingcrust.com',
                'password' => '$2y$10$dvLLS2tLu3nJPMCtmaX.COKdocxEzO.mpVfHA9uSOoq8/GYr0Z75u',
                'role' => 'user',
                'created_at'=>'2022-05-17 05:48:18',
                'updated_at'=>'2022-05-17 05:48:18'
            ],
            [
                'name' => 'Default Admin',
                'email' => 'da@codingcrust.com',
                'password' => '$2y$10$dvLLS2tLu3nJPMCtmaX.COKdocxEzO.mpVfHA9uSOoq8/GYr0Z75u',
                'role' => 'admin',
                'created_at'=>'2022-05-17 05:48:18',
                'updated_at'=>'2022-05-17 05:48:18'
            ]
        ]);
    }
}
