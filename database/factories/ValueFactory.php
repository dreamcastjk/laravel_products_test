<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Property;
use App\Models\Value;
use Faker\Generator as Faker;

$factory->define(Value::class, function (Faker $faker) {
    return [
        'property_id' => Property::inRandomOrder()->first()->id,
        'name' => $faker->words(1, true),
        'created_at' => \Carbon\Carbon::now(new DateTimeZone(config('app.timezone'))),
        'updated_at' => \Carbon\Carbon::now(new DateTimeZone(config('app.timezone'))),
    ];
});
