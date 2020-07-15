<?php

namespace App;

use BinaryCabin\LaravelUUID\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DoctorProfile extends Model
{
    use HasUUID, SoftDeletes;

    protected $guarded = [];

    public function user() {
        return $this->belongsTo('App\user', 'doctor_uuid', 'uuid');
    }


    public function department() {
        return $this->hasOne('App\Department', 'uuid', 'department_id');
    }
}
