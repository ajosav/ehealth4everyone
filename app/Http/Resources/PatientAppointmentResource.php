<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientAppointmentResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {
        $patient= $this->patient_user;
        $status = 0; 
        if($this->status == 0) {
            $status = 'Pending';
        } elseif($this->status == 1) {
            $status = 'Approved';
        } else {
            $status = 'Rejected';
        }
        return [
            'name' => $patient->name,
            'phone' => $patient->phone,
            'start_time' => $this->start_time,
            'stop_time' => $this->stop_time,
            'status' => $status
        ];
    }
}



