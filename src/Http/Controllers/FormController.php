<?php

namespace TPenaranda\Duckform\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use TPenaranda\Duckform\Facade\Duckform;
use TPenaranda\Duckform\Http\Resources\{Form as FormResource, FormSubmit as FormSubmitResource};
use TPenaranda\Duckform\Models\{Form, FormSubmit, PossibleAnswer};

class FormController extends Controller
{
    protected function getFormOrFail(string $formIdentifier)
    {
        if (empty($form = Form::find($formIdentifier))) {
            throw (new ModelNotFoundException)->setModel(Form::class, $formIdentifier);
        }

        return $form;
    }

    protected function getFormSubmitOrFail(string $token)
    {
        if (empty($formSubmit = FormSubmit::firstByToken($token))) {
            throw (new ModelNotFoundException)->setModel(FormSubmit::class, $token);
        }

        return $formSubmit;
    }

    public function getAllForms(Request $request)
    {
        return FormResource::collection(Form::with('sections.questions.possibleAnswers')->paginate());
    }

    public function getForm(Request $request, string $formIdentifier)
    {
        $form = $this->getFormOrFail($formIdentifier);

        return FormResource::make($form->load('sections.questions.possibleAnswers'));
    }

    public function getAllFormSubmits(Request $request, string $formIdentifier)
    {
        $form = $this->getFormOrFail($formIdentifier);

        return FormSubmitResource::collection($form->submits);
    }

    public function getFormSubmit(Request $request, string $formIdentifier, string $formSubmitToken)
    {
        $form = $this->getFormOrFail($formIdentifier);
        $formSubmit = $this->getFormSubmitOrFail($formSubmitToken);

        if ($formSubmit->form->isNot($form)) {
            abort(400);
        }

        return FormSubmitResource::make($formSubmit);
    }

    public function createFormSubmit(Request $request, string $formIdentifier)
    {
        $formSubmit = $this->getFormOrFail($formIdentifier)->submits()->create();

        foreach ($request->json('data.sections') as $section) {
            foreach ($section['questions'] as $question) {
                foreach ($question['possible_answers_selected'] as $answer) {
                    $formSubmit->responses()->attach($answer['id'], [
                        'possible_answer_data' => $answer['data'] ?? null
                    ]);
                }
            }
        }

        if ($formSubmit->isFullfiled()) {
            $formSubmit->markAsCompleted();
        }

        return FormSubmitResource::make($formSubmit->refresh());
    }

    public function updateFormSubmit(Request $request, string $formIdentifier, string $formSubmitToken)
    {
        $form = $this->getFormOrFail($formIdentifier);
        $formSubmit = $this->getFormSubmitOrFail($formSubmitToken);

        if (!$formSubmit->form->is($form)) {
            abort(400);
        }

        foreach ($request->json('data.sections') as $section) {
            foreach ($section['questions'] as $question) {
                $formSubmit->responses()->detach(PossibleAnswer::whereHas('question', function ($builder) use ($question) {
                    return $builder->whereId($question['id']);
                })->get());
                foreach ($question['possible_answers_selected'] as $answer) {
                    $formSubmit->responses()->attach($answer['id'], [
                        'possible_answer_data' => $answer['data'] ?? null
                    ]);
                }
            }
        }

        if ($formSubmit->isFullfiled()) {
            $formSubmit->markAsCompleted();
        }

        return FormSubmitResource::make($formSubmit->refresh());
    }
}
