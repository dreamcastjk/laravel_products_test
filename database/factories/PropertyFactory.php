<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Property;
use Faker\Generator as Faker;

$factory->define(Property::class, function (Faker $faker) {
    return [
        'title' => $faker->words(1, true),
        'created_at' => \Carbon\Carbon::now(new DateTimeZone(config('app.timezone'))),
        'updated_at' => \Carbon\Carbon::now(new DateTimeZone(config('app.timezone'))),
    ];
});
