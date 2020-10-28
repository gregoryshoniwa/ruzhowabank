<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transaction;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {
    return [
    	//'created_at' =>$faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now', $timezone = null),
    	'created_at' =>$faker->dateTimeThisMonth($max = 'now', $timezone = null),
    	'description' => $faker->randomElement(['Withdrawal','Bought shares','Deposited into savings','Bought Units','Fine']),
    	'amount' => $faker->randomFloat($maxDecimals = 2, $min = 2, $max = 1000),
    	'ruzhowa_id' => $faker->randomElement(['R1111','R1112','R1113']),
    ];
});
