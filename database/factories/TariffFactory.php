<?php
use Faker\Generator as Faker;
$factory->define(App\Tariff::class, function (Faker $faker) {
    return [
        'description'       => $faker->sentence,
        'technical_level'   => random_int(1, 5),
        'price'             => random_int(1, 50),
        'company_id'        => 1
    ];
});
