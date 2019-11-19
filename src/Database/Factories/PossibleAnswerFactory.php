<?php

use TPenaranda\Duckform\Models\{PossibleAnswer, Question};
use Faker\Generator as Faker;

$factory->define(PossibleAnswer::class, function (Faker $faker) {
    return [
        'question_id' => factory(Question::class),
        'text' => $faker->sentence(2),
    ];
});
