<?php

use App\Mail\EmailVerified;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['verify' => true]);

Route::group(['prefix' => 'dashboard', 'namespace'=> 'Dashboard'], function () {
    Route::get('/', 'DashboardController@index');
    Route::resource('/profile', 'PatientController');
    Route::resource('/manage_profile', 'DoctorController');
    Route::get('/department', 'DepartmentController@index');
    Route::get('/all_departments', 'DepartmentController@allDepartments');
    Route::delete('/delete_department/{id}', 'DepartmentController@destroy');
    Route::post('/create_department', 'DepartmentController@store');
    Route::put('/update_department/{id}', 'DepartmentController@update');
    Route::get('/appointment', 'AppointmentController@index');
    Route::get('/find_doctor_by_dept/{$id}', 'AppointmentController@findDoctor');
});

Route::get('/email', function() {
    return new EmailVerified();
});
Route::get('/sendemail', function() {
    $user = auth()->user();

    \Mail::to($user)->send(new EmailVerified());
        // Mail::send('mail.email_verified', ['user' => $user], function ($m) use ($user) {
        //     $m->from('everyone@ehealthforeveryone.com', 'EHealth4everyone');

        //     $m->to($user->email, $user->name)->subject('Your Reminder!');
        // });
});



