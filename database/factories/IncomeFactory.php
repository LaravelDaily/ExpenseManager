<?php

$factory->define(App\Income::class, function (Faker\Generator $faker) {
    return [
        "income_category_id" => factory('App\IncomeCategory')->create(),
        "entry_date" => $faker->date("Y-m-d", $max = 'now'),
        "amount" => $faker->name,
        "created_by_id" => factory('App\User')->create(),
    ];
});
