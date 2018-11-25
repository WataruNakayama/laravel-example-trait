<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    $created_at = $faker->dateTime();
    $updated_at = new Carbon\Carbon($created_at->format('Y-m-d H:i:s'));
    return [
        'title' => $faker->sentence,
        'body' => $faker->realText,
        'created_at' => $created_at,
        'updated_at' => ($faker->boolean) ? $updated_at->addDays($faker->numberBetween(3, 30)) : null
    ];
});
