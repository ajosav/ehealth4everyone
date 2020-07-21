<?php

namespace App;

use BinaryCabin\LaravelUUID\Traits\HasUUID;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasUUID, Notifiable, HasApiTokens, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'password', 'role', 'dob', 'address', 'user_code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function doctorProfile() {
        return $this->hasOne('App\DoctorProfile', 'doctor_uuid', 'uuid');
    }

    public function patientProfile() {
        return $this->hasOne('App\PatientProfile', 'patient_uuid', 'uuid');
    }

    public function doctor_appointment() {
        return $this->hasMany('App\Appointment', 'doctor_uuid', 'uuid');
    }

    public function patient_appointment() {
        return $this->hasMany('App\Appointment', 'patient_uuid', 'uuid');
    }
    
}
