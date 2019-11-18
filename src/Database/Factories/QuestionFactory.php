<?php

use Faker\Generator as Faker;
use TPenaranda\Duckform\Facade\Duckform;
use TPenaranda\Duckform\Models\{PossibleAnswer, Question};

$factory->define(Question::class, function (Faker $faker) {
    return [
        'form_id' => Duckform::factory(Form::class),
        'randomize_possible_answers' => $faker->boolean,
        'text' => $faker->sentence(3),
        'type' => $faker->randomElement(Question::TYPES),
    ];
});

$factory->afterCreatingState(Question::class,'with-possible-answers' ,function ($question, $faker) {
    switch ($question->type) {
        case 'multiselect':
        case 'single_select':
            $items = range(1, rand(3, 5));
            break;
        case 'scale_1-10':
            $items = range(1, 10);
            break;
        case 'yes_no':
            $items = range(1, 2);
            break;
        default:
            $items = [1];
            break;
    }

    foreach ($items as $i) {
        $possible = Duckform::factory(PossibleAnswer::class)->create([
            'question_id' => $question->id,
            'text' => $faker->sentence(2),
        ]);
    }
});
