<?php

namespace TPenaranda\Duckform\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Form extends JsonResource
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
            'description' => $this->description,
            'sections' => Section::collection($this->whenLoaded('sections')),
            'slug' => $this->slug,
            'title' => $this->title,
            'token' => $this->getToken(),
        ];
    }
}
