<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'category_id' => random_int(1,2),
        'title' => $faker->sentences(2, true)
    ];
});
