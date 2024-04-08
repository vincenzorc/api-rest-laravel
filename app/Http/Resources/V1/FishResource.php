<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FishResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'family' => [
                $this->family_id, 
                $this->family->name
            ],
            'gender' => [
                $this->gender_id, 
                $this->gender->name
            ],
            'name'  => $this->name,
            'scientific_name' => $this->scientific_name,
            'size' => $this->size,
            'longevity' => $this->longevity,
            'description' => $this->description,
            'temper' => $this->temper,
            'countries' => $this->countries,
            'photo' => $this->photo
        ];
    }
}
