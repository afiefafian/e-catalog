<?php

use Faker\Generator as Faker;
use App\Model\Regency;

$factory->define(App\Supplier::class, function (Faker $faker) {
    return [
        'nama' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'kota_asal' => function () {
            return Regency::inRandomOrder()->first()->id;
        },
        'thn_lahir' => $faker->numberBetween($min = 1975, $max = 2000),
    ];
});
