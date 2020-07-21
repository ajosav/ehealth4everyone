<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DoctorAppointmentResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $doctor= $this->doctor_user;
        return [
            'name' => $doctor->name,
            'phone' => $doctor->phone,
            'start_time' => $this->start_time,
            'stop_time' => $this->finish_time
        ];
    }
}
