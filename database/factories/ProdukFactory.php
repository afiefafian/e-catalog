<?php

use Faker\Generator as Faker;
use App\Supplier;


$factory->define(App\Produk::class, function (Faker $faker) {
    return [
        'nama' => $faker->sentence($nbWords = 5, $variableNbWords = true),
        'supplier_id' => function () {
            return Supplier::inRandomOrder()->first()->id;
        },
        'harga' => $faker->numberBetween($min = 35000, $max = 150000),
        'active' => true,
    ];
});
