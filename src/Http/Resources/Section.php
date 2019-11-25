<?php

namespace TPenaranda\Duckform\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Section extends JsonResource
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
            'description' => $this->description,
            'order' => $this->order,
            'questions' => Question::collection($this->whenLoaded('questions')),
            'slug' => $this->slug,
            'title' => $this->title,
        ];
    }
}
