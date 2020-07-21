<?php

namespace App\Http\Controllers\dashboard;

use App\Appointment;
use App\Department;
use App\DoctorProfile;
use App\Http\Controllers\Controller;
use App\Http\Requests\AppointmentRequest;
use App\Http\Resources\AppointmentResource;
use App\Http\Resources\DoctorAppointmentResource;
use App\Http\Resources\DoctorsDepartmentResource;
use App\Http\Resources\PatientAppointmentResource;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Gate;

class AppointmentController extends Controller
{
    public function __construct() {
        return $this->middleware(['auth', 'verified']);
    }
    public function index()
    {
        return view('pages.appointment.create_appointment');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewAppointments()
    {
        if(Gate::denies('doctor')) {
            $appointments = Appointment::where('patient_uuid', auth()->user()->uuid)->get();
            return $this->success('success', PatientAppointmentResource::collection($appointments));
        } else {
            $appointments = Appointment::where('doctor_uuid', auth()->user()->uuid)->get();
            return $this->success('success', DoctorAppointmentResource::collection($appointments));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppointmentRequest $request)
    {
        $user_id = auth()->user()->uuid;
        $start_time = Carbon::parse($request->start_time)->format('Y-m-d H:i');
        $stop_time = Carbon::parse($request->stop_time)->format('Y-m-d H:i');
        $create_appointment = Appointment::create([
            'patient_uuid' => $user_id,
            'doctor_uuid' => $request->doctor,
            'start_time' => $start_time,
            'finish_time' => $stop_time,
            'status' => 0
        ]);
        if($create_appointment) {
            return $this->success('Successfully created Appointment');
        }

        return $this->failed('Error creating Appointment');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function findDoctor($id) {
        $department = Department::findByUuid($id);
        if(!$department) {
            return $this->failed('Department not found');
        }

        $doctors = $department->findAllDoctorsByDepartment()->get();
        if(!$doctors) {
            return $this->failed('Unable to find doctor');
        }
        return DoctorsDepartmentResource::collection($doctors);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
