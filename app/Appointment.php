<?php

namespace App;

use BinaryCabin\LaravelUUID\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes, HasUUID;
    
    protected $guarded = [];

    public function patient_user() {
        return $this->belongsTo('App\User', 'patient_uuid', 'uuid');
    }

    public function doctor_user() {
        return $this->belongsTo('App\User', 'doctor_uuid', 'uuid');
    }
    
}
