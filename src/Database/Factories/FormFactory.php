<?php

use Faker\Generator as Faker;
use TPenaranda\Duckform\Facade\Duckform;
use TPenaranda\Duckform\Models\{Form, Question};

$factory->define(Form::class, function (Faker $faker) {
    $title = $faker->sentence(2);

    return [
        'description' => $faker->sentence(2),
        'slug' => str_slug($title),
        'title' => $title,
    ];
});

$factory->afterCreatingState(Form::class, 'with-questions', function ($form, $faker) {
    Duckform::factory(Question::class, rand(10, 20))->states('with-possible-answers')->create([
        'form_id' => $form->id,
    ]);
});

$factory->afterCreating(Form::class, function ($form, $faker) {
    $form->getToken();
});
