<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DoctorsDepartmentResource extends JsonResource
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
            'uuid' => $this->uuid,
            'title' => $this->title,
            'name' => $this->name,
            'position' => $this->position,
            'specialiazation' => $this->specialiazation,
            'experience' => $this->experience,
            'certificates' => $this->certificates,
            'charge' => $this->visitation_charge,
        ];
    }
}
