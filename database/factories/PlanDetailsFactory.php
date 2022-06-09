<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PlanDetail;
use Faker\Generator as Faker;

$factory->define(PlanDetail::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word,
        'plan_id'  => function() {
            return factory('App\Models\Plan')->create()->id;
        }
    ];
});
