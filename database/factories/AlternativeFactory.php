<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Alternative;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Alternative::class, function (Faker $faker) {
    return [
        'title' => $faker->words(3, true)
    ];
});
