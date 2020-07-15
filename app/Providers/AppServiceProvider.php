<?php

namespace App\Providers;

use App\DoctorProfile;
use App\PatientProfile;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        return view()->composer('*', function($view) {

            if(auth()->check()) {
                $patient_profile = PatientProfile::findByUuid(auth()->user()->uuid);
                $doctor_profile = DoctorProfile::findByUuid(auth()->user()->uuid);
                $view->with('patient_profile', $patient_profile);
                $view->with('doctor_profile', $doctor_profile);
            }

        });
    }
}
