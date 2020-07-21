<?php

namespace App;

use BinaryCabin\LaravelUUID\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes, HasUUID;

    protected $fillable = ['title', 'description'];



    public function doc_profile() {
        return $this->hasOne('App\DoctorProfile', 'department_id', 'uuid');
    }

    public function findAllDoctorsByDepartment() {
        return $this->join('doctor_profiles', 'departments.uuid', '=', 'doctor_profiles.department_id')
        ->join('users', 'doctor_profiles.doctor_uuid', '=', 'users.uuid')
        ->where('department_id', $this->uuid);
        ;
    }
}
