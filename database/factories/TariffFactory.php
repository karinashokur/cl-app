<?php
use Faker\Generator as Faker;
$factory->define(App\Tariff::class, function (Faker $faker) {
    return [
        'technical_level'   => random_int(1, 5),
        'price'             => random_int(1, 50),
        'user_id'        => 1
    ];
});
