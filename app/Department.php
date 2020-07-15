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
}
