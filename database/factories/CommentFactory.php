<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'content' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'article_id' => $faker->randomDigitNotNull
    ];
});
