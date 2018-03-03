<?php

use Illuminate\Database\Seeder;

class CurrencySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'USD', 'symbol' => '$', 'money_format_thousands' => ',', 'money_format_decimal' => '.', 'created_by_id' => 1],
            ['id' => 2, 'title' => 'EUR', 'symbol' => '€', 'money_format_thousands' => '.', 'money_format_decimal' => ',', 'created_by_id' => 1],
            ['id' => 3, 'title' => 'GBP', 'symbol' => '£', 'money_format_thousands' => '.', 'money_format_decimal' => ',', 'created_by_id' => 1],

        ];

        foreach ($items as $item) {
            \App\Currency::create($item);
        }
    }
}