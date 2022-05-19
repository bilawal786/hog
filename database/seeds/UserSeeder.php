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
                'name' => 'User 01',
                'email' => 'user01@heartofgold.com',
                'password' => '$2y$10$dvLLS2tLu3nJPMCtmaX.COKdocxEzO.mpVfHA9uSOoq8/GYr0Z75u',
                'role' => 'user',
                'created_at'=>'2022-05-17 05:48:18',
                'updated_at'=>'2022-05-17 05:48:18'
            ],
            [
                'name' => 'Admin 01',
                'email' => 'admin01@heartofgold.com',
                'password' => '$2y$10$dvLLS2tLu3nJPMCtmaX.COKdocxEzO.mpVfHA9uSOoq8/GYr0Z75u',
                'role' => 'admin',
                'created_at'=>'2022-05-17 05:48:18',
                'updated_at'=>'2022-05-17 05:48:18'
            ]
        ]);
    }
}
