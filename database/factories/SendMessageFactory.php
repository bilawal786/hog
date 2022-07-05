<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SendMessage;
use Faker\Generator as Faker;

$factory->define(SendMessage::class, function (Faker $faker) {
    return [
        'type' => 'Request Ride',
        'Fname' => $faker->firstName,
        'Lname' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->numerify('##########'),
        'card_on_file' => 'Yes-25/32',
        'relative' => 'Mother',
        'relative_no' => $faker->numerify('##########'),
        'facility' => 'na/',
//        'waiting' => '1',
        'message' => 'this is message new',
        'wheelchair' => 'no',
        'round_trip' => 'no',
        'trip_date' => '2022-07-05T02:32:31.200-04:00',
        'start_lat' => '40.8091663',
        'start_lng' => '-74.067868',
        'end_lat' => '40.7812199',
        'end_lng' => '-73.9665138',
        'distance' => '9.07985373609',
        'start_address' => '1 American Dream Wy, East Rutherford, NJ 07073, USA',
        'end_address' => 'New York, NY, USA',
        'cost' => 20,
        'status_assign' => 'no',
//        'user_id' => 3,
        'created_at'=>'2022-05-17 05:48:18',
        'updated_at'=>'2022-05-17 05:48:18'
    ];
});
