<?php

namespace TPenaranda\Duckform\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PossibleAnswer extends JsonResource
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
            'text' => $this->text,
            'order' => $this->order,
        ];
    }
}
