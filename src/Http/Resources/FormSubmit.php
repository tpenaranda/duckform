<?php

namespace TPenaranda\Duckform\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FormSubmit extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'sections' => $this->form->sections->map(function ($section) {
                return [
                    'slug' => $section->slug,
                    'questions' => $section->questions->map(function ($question) {
                        return [
                            'id' => $question->id,
                            'possible_answers_selected' => $this->responses->filter(function ($response) use ($question) {
                                return $response->question->id === $question->id;
                            })->map(function ($possibleAnswer) {
                                return [
                                    'id' => $possibleAnswer->pivot->possible_answer_id,
                                    'data' => $possibleAnswer->pivot->possible_answer_data,
                                ];
                            })->values(),
                        ];
                    })->filter(function ($question) {
                        return $question['possible_answers_selected']->isNotEmpty();
                    }),
                ];
            })->filter(function ($section) { return $section['questions']->isNotEmpty(); }),
            'token' => $this->getToken(),
            'completed_at' => $this->completed_at,
            'reference_id' => $this->reference_id,
        ];
    }
}
