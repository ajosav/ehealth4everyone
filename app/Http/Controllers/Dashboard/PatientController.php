<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gate;
use Illuminate\Http\Response;
use App\PatientProfile;


class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    /**
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('patient'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return auth()->user()->role;
        // return view('pages.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('patient'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $patient = PatientProfile::where('patient_uuid', auth()->user()->uuid)->exists();

        if ($patient) {
            # code...
            $patient = PatientProfile::where('patient_uuid', auth()->user()->uuid)->get();
            return view('pages.patient.create_profile', ['patient' => $patient[0]]);
        } 

        return view('pages.patient.create_profile', ['patient'=>null]);




    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        foreach ($request->except('_token') as $data => $value) {
            $valids[$data] = "required";
          }

          $request->validate($valids);

          $data = array_merge($request->except('_token'), ['patient_uuid' => auth()->user()->uuid]);

          $save_profile = PatientProfile::firstOrCreate(
            ['patient_uuid' => auth()->user()->uuid],
            $data
        );


          if ($save_profile) {
              # code...

          return redirect()->back()->with('message', 'Patient Info Successfully Saved.');
          } else {
              # code...

          return redirect()->back()->with('err_msg', 'Error Saving Patient Info.');
          }




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('patient'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('pages.patient.view_profile');
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
