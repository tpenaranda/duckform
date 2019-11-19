<?php

namespace TPenaranda\Duckform\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use TPenaranda\Duckform\Facade\Duckform;

class FormController extends Controller
{
    public function get(Request $request, string $formIdentifier)
    {
        if (empty($form = Duckform::find($formIdentifier))) {
            abort(404);
        }

        return response()->json($form->load('sections.questions.possibleAnswers'));
    }
}
