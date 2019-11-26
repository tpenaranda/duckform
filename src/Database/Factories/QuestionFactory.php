<?php

use Faker\Generator as Faker;
use TPenaranda\Duckform\Facade\Duckform;
use TPenaranda\Duckform\Models\{PossibleAnswer, Question, Section};

$factory->define(Question::class, function (Faker $faker) {
    return [
        'randomize_possible_answers' => $faker->boolean,
        'required' => $faker->boolean,
        'section_id' => Duckform::factory(Section::class),
        'text' => $faker->sentence(3),
        'type' => $faker->randomElement(Question::TYPES),
    ];
});

$factory->afterCreatingState(Question::class,'with-possible-answers' ,function ($question, $faker) {
    switch ($question->type) {
        case 'multiselect':
        case 'single_select':
            foreach (range(1, rand(3, 6)) as $order) {
                Duckform::factory(PossibleAnswer::class)->create([
                    'order' => $order,
                    'question_id' => $question->id,
                    'text' => $faker->sentence(2),
                ]);
            }
            break;
        case 'scale':
            Duckform::factory(PossibleAnswer::class)->create([
                'question_id' => $question->id,
                'text' => 'Lowest',
            ]);
            Duckform::factory(PossibleAnswer::class, rand(0, 1) ? range(1, 3) : range(1, 8))->create([
                'question_id' => $question->id,
            ]);
            Duckform::factory(PossibleAnswer::class)->create([
                'question_id' => $question->id,
                'text' => 'Highest',
            ]);
            break;
        case 'yes_no':
            Duckform::factory(PossibleAnswer::class)->create([
                'question_id' => $question->id,
                'text' => 'Yes',
            ]);
            Duckform::factory(PossibleAnswer::class)->create([
                'question_id' => $question->id,
                'text' => 'No',
            ]);
            break;
        case 'free_text':
        case 'date':
            Duckform::factory(PossibleAnswer::class)->create([
                'question_id' => $question->id,
                'text' => null,
            ]);
            break;
        case 'integer':
            Duckform::factory(PossibleAnswer::class)->create([
                'question_id' => $question->id,
                'text' => 'Units',
            ]);
            break;

        default:
            Duckform::factory(PossibleAnswer::class)->create([
                'question_id' => $question->id,
                'text' => $faker->sentence(2),
            ]);
            break;
    }
});
