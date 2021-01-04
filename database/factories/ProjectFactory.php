<?php
use Faker\Generator as Faker;
$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'name'          =>  'Project-' . random_int(1, 100),
        'budget'        => random_int(1, 10000),
        'description'   => $faker->sentence,
        'user_id'       => 1,
        'customer_id'   => 1
    ];
});
