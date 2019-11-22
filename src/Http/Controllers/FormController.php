<?php

namespace TPenaranda\Duckform\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use TPenaranda\Duckform\Facade\Duckform;
use TPenaranda\Duckform\Models\{FormSubmit, PossibleAnswer};

class FormController extends Controller
{
    public function getAllForms(Request $request, string $formIdentifier)
    {
        return 'Not implemented yet.';
    }

    public function getForm(Request $request, string $formIdentifier)
    {
        if (empty($form = Duckform::find($formIdentifier))) {
            abort(404);
        }

        return response()->json($form->load('sections.questions.possibleAnswers'));
    }

    public function getAllFormSubmits(Request $request, string $formIdentifier)
    {
        return 'Not implemented yet.';
    }

    public function getFormSubmit(Request $request, string $formIdentifier, string $submitToken)
    {
        if (empty($form = Duckform::find($formIdentifier))) {
            abort(404);
        }

        if (empty($formSubmit = FormSubmit::firstByToken($submitToken))) {
            abort(404);
        }

        if (!$formSubmit->form->is($form)) {
            abort(400);
        }

        $form = $formSubmit->form->load('sections.questions.possibleAnswers');
        $responses = $formSubmit->responses;


        $form->sections->each(function ($section) use ($responses) {
            $section->questions->each(function ($question) use ($responses) {
                $question->possible_answers_selected =  $responses->filter(function ($response) use ($question) {
                    return $response->question->id === $question->id;
                })->map(function ($possibleAnswer) {
                    return [
                        'id' => $possibleAnswer->pivot->possible_answer_id,
                        'data' => $possibleAnswer->pivot->possible_answer_data,
                    ];
                })->values()->toArray();
            });
        });

        return $form;
    }

    public function saveFormSubmit(Request $request, string $formIdentifier, string $submitToken)
    {
        if (empty($form = Duckform::find($formIdentifier))) {
            abort(404);
        }

        if (empty($formSubmit = FormSubmit::firstByToken($submitToken))) {
            abort(404);
        }

        if (!$formSubmit->form->is($form)) {
            abort(400);
        }

        foreach ($request->json('questions') as $question) {
            $formSubmit->responses()->detach(PossibleAnswer::whereHas('question', function ($builder) use ($question) {
                return $builder->whereId($question['id']);
            })->get());

            foreach ($question['possible_answers_selected'] as $answer) {
                $formSubmit->responses()->attach($answer['id'], [
                    'possible_answer_data' => empty($answer['data']) ? null : $answer['data'],
                ]);
            }
        }

        return $form->refresh()->load('sections.questions.possibleAnswers');
    }
}
