<?php

use Faker\Generator as Faker;

$factory->define(App\Message::class, function (Faker $faker) {
    return [
        'content' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true) ." \n \r \n \r" . $faker->name,
    ];
});
