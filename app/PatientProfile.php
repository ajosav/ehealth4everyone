<?php

namespace App;

use BinaryCabin\LaravelUUID\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientProfile extends Model
{
    use SoftDeletes, HasUUID;
    protected $guarded = [];


    public function user() {
        return $this->belongsTo('App\User', 'uuid', 'patient_uuid');
    }
}
