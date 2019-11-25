<?php

namespace TPenaranda\Duckform\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Question extends JsonResource
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
            'possible_answers' => PossibleAnswer::collection($this->whenLoaded('possibleAnswers')),
            'randomize_possible_answers' => (boolean) $this->randomize_possible_answers,
            'required' => (boolean) $this->required,
            'text' => $this->text,
            'type' => $this->type,
        ];
    }
}
