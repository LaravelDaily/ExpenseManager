<?php

$factory->define(App\Currency::class, function (Faker\Generator $faker) {
    return [
        "title" => $faker->name,
        "symbol" => $faker->name,
        "money_format" => $faker->name,
        "created_by_id" => factory('App\User')->create(),
    ];
});
