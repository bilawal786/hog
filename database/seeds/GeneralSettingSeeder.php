<?php

use Illuminate\Database\Seeder;

class GeneralSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('general_settings')->insert([
            'header_logo' => '/images/heart-of-gold.png',
            'footer_logo' => '/images/footlogo.png',
            'footer_about' => 'Heart of Gold Medical Transport is a family-owned non-emergency medical transportation company serving the greater Sacramento area since 2016. Its owner is Megan. Megan has worked as a nurse since 2009, becoming a Registered Nurse',
            'email' => 'contact@heartofgoldmedtransport.com',
            'phone' => '+19167406447',
            'office_address' => '1329 Howe Ave #205, Sacramento, CA 95825',
            'mailing_address' => '7828 Zenith Dr. #7862, Citrus Heights, CA 95621',
        ]);

    }
}
