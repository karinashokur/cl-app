<?php
use Faker\Generator as Faker;
$factory->define(App\Company::class, function (Faker $faker) {
    return [
        'name'          => $faker->title,
        'email'         => $faker->email,
        'phone'         => $faker->e164PhoneNumber,
        'address'       => $faker->address,
        'description'   => $faker->sentence,
        'user_id'       => 1
    ];
});
