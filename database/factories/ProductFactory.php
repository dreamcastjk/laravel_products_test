<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->words(1,true),
        'price' => $faker->randomNumber(2),
        'count' => $faker->randomNumber(2),
        'created_at' => \Carbon\Carbon::now(new DateTimeZone(config('app.timezone'))),
        'updated_at' => \Carbon\Carbon::now(new DateTimeZone(config('app.timezone'))),
    ];
});
