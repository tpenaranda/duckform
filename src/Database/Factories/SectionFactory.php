<?php

use Faker\Generator as Faker;
use TPenaranda\Duckform\Facade\Duckform;
use TPenaranda\Duckform\Models\{Form, Question, Section};

$factory->define(Section::class, function (Faker $faker) {
    $title = $faker->sentence(2);

    return [
        'form_id' => Duckform::factory(Form::class),
        'description' => $faker->sentence(2),
        'slug' => str_slug($title),
        'title' => $title,
    ];
});

$factory->afterCreatingState(Section::class, 'with-questions', function ($section, $faker) {
    Duckform::factory(Question::class, rand(10, 20))->states('with-possible-answers')->create([
        'section_id' => $section->id,
    ]);
});

