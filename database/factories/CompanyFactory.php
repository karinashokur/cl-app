<?php
use Faker\Generator as Faker;
$factory->define(App\Company::class, function (Faker $faker) {
    return [
        'name'          => $faker->name,
        'email'         => $faker->email,
        'phone'         => $faker->phone,
        'description'   => $faker->sentence
    ];
});
