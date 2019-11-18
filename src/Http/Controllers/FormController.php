<?php

namespace TPenaranda\Duckform\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use TPenaranda\Duckform\Models\Form;

class FormController extends Controller
{
    public function get(Request $request, string $formToken)
    {
        if (empty($form = Form::firstByToken($formToken))) {
            abort(404);
        }

        return response()->json($form->load('questions.possibleAnswers'));
    }
}
