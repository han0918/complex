<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Admin::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'password' => bcrypt('admin888'),
        'remember_token' => str_random(10),
    ];
});
