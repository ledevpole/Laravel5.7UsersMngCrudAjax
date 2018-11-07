<?php

use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
    return [
    	'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    	'body'  => $faker->paragraph($nbSentences = 6, $variableNbSentences = true),
    	'user_id' => $faker->randomDigitNotNull,     
    ];
});
