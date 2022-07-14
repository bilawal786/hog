<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(GeneralSettingSeeder::class);
//         $this->call(UserSeeder::class);
        factory('App\User', 500)->create();
//        factory('App\SendMessage', 100)->create();
    }
}
