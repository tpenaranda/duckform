<?php

use Faker\Generator as Faker;
use TPenaranda\Duckform\Facade\Duckform;
use TPenaranda\Duckform\Models\{Form, Section};

$factory->define(Form::class, function (Faker $faker) {
    $title = $faker->sentence(2);

    return [
        'description' => $faker->sentence(2),
        'slug' => str_slug($title),
        'title' => $title,
    ];
});

$factory->afterCreatingState(Form::class, 'with-sections', function ($form, $faker) {
    Duckform::factory(Section::class, rand(2, 5))->states('with-questions')->create([
        'form_id' => $form->id,
    ]);
});

$factory->afterCreating(Form::class, function ($form, $faker) {
    $form->getToken();
});
