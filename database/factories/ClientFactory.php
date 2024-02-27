
<?php

use App\Models\Client;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\Client::class, function (Faker $faker) {

    $first_name = $faker->firstName;
    $last_name = $faker->lastName;
    $profession = $faker->jobTitle;
    $age = $faker->numberBetween(12, 74);

    $data = [
        'first_name' => $first_name,
        'last_name' => $last_name,
        'profession' => $profession,
        'age' => $age,
    ];

     return $data;
});
