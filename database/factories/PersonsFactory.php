<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Persons;
use Faker\Generator as Faker;

$factory->define(Persons::class, function (Faker $faker) {
    return [
        'Name' => $faker->name,
        'Age' => $faker->numberBetween(1, 100),
        'Nationality' => $faker->country,
        'Residence' => $faker->address,
        'Email' => $faker->unique()->safeEmail,
        'Birthdate' => $faker->date(),
    ];
});
