<?php

$factory->define(App\Expense::class, function (Faker\Generator $faker) {
    return [
        "expense_category_id" => factory('App\ExpenseCategory')->create(),
        "entry_date" => $faker->date("Y-m-d", $max = 'now'),
        "amount" => $faker->name,
        "created_by_id" => factory('App\User')->create(),
    ];
});
