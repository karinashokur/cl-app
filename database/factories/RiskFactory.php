<?php
use Faker\Generator as Faker;
$factory->define(App\Risk::class, function (Faker $faker) {
    return [
        'name'          => $faker->word,
        'seriousness'   => random_int(1, 5),
        'description'   => $faker->sentence,
        'task_id'       => 1
    ];
});
