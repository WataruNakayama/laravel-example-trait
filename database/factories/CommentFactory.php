<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Comment::class, function (Faker $faker) {
    $values = [
        'user_id' => App\Models\User::all()->random(1)->first()->id,
        'parent_id' => null,
        'body' => $faker->text
    ];
    if ($faker->boolean) {
        $values['updated_at'] = null;
    }
    return $values;
});
