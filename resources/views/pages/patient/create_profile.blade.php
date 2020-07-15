@extends('layouts.ehealth')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Home</li>
                    <li class="breadcrumb-item active">Profile</li>
                    <li class="breadcrumb-item active">Create or Update Profile</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-edit"></i>
                    Create or Update Profile
                </h3>
            </div>
            <div class="card-body">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif
                @if(session()->has('err_msg'))
                <div class="alert alert-danger">
                    {{ session()->get('message') }}
                </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="container">
                    <form class="mt-5" method="post" action="{{ url('/dashboard/profile') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input name="title" value="{{ $patient->title ?? '' }}" type="text" class="form-control" id="" aria-describedby="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Sex</label>
                                    <select class="form-control" name="sex">
                                        <option value="{{ $patient->sex ?? '' }}">{{ $patient->sex ?? '' }}</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Marital Status</label>
                                    <select class="form-control" name="marital_status">
                                        <option value="{{ $patient->title ?? '' }}">{{ $patient->marital_status ?? '' }}</option>
                                        <option value="single">Single</option>
                                        <option value="married">Married</option>
                                        <option value="divorced">Divorced</option>
                                        <option value="Widow">Widow/Widower</option>
                                        <option value="complicated">Complicated</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Blood Group</label>
                                    <select class="form-control">
                                        <option selected disabled value="{{ $patient->blood_group ?? '' }}">{{ $patient->blood_group ?? '' }}</option>
                                        <option value="a_positive">A<sup>+</sup></option>
                                        <option value="a_negative">A<sup>-</sup></option>
                                        <option value="b_positive">B<sup>+</sup></option>
                                        <option value="a_negative">B<sup>-</sup></option>
                                        <option value="ab_positive">AB<sup>+</sup></option>
                                        <option value="ab_negative">AB<sup>-</sup></option>
                                        <option value="o_positive">O<sup>+</sup></option>
                                        <option value="o_negative">O<sup>-</sup></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Genotype</label>
                                    <select class="form-control" name="blood_type">
                                        <option value="{{ $patient->blood_type ?? '' }}">{{ $patient->blood_type ?? '' }}</option>
                                        <option value="aa">AA</option>
                                        <option value="ac">AC</option>
                                        <option value="as">AS</option>
                                        <option value="cc">CC</option>
                                        <option value="sc">SC</option>
                                        <option value="ss">SS</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Height</label>
                                    <input type="number" value="{{ $patient->height ?? '' }}" step="0.1" name="height" class="form-control" id="" aria-describedby="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Body Mass Index (BMI)</label>
                                    <input name="bmi" value="{{ $patient->bmi ?? '' }}" type="text" class="form-control" id="" aria-describedby="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Blood Pressure</label>
                                    <input name="bp" type="text" value="{{ $patient->bp ?? '' }}" class="form-control" id="" aria-describedby="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Weight</label>
                                    <input name="weight" value="{{ $patient->weight ?? '' }}" type="text" class="form-control" id="" aria-describedby="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Vision</label>
                                    <input name="vision" value="{{ $patient->vision ?? '' }}" type="text" class="form-control" id="" aria-describedby="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hearing</label>
                                    <input name="Hearing" value="{{ $patient->Hearing ?? '' }}" type="text" class="form-control" id="" aria-describedby="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Oxygen Saturation</label>
                                    <input name="oxygen_sat" value="{{ $patient->oxygen_sat ?? '' }}" type="text" class="form-control" id="" aria-describedby="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Alcohol</label>
                                    <select class="form-control" name="alchohol">
                                        <option value="">Select an option</option>
                                        @if($patient)
                                            <option @if($patient->alchohol)@if($patient->alchohol == 1) {{ 'selected' }} @endif @endif() value="1">True</option>
                                            <option @if($patient->alchohol)@if($patient->alchohol == 0) {{ 'selected' }} @endif @endif() value="0">False</option>
                                        @else
                                            <option value="1">True</option>
                                            <option {{ 'selected' }} value="0">False</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Drugs</label>
                                    <select class="form-control" name="drug">
                                        <option value="">Select an option</option>
                                        @if($patient)
                                            <option @if($patient->drug)@if($patient->drug == 1) {{ 'selected' }} @endif @endif()  value="1">True</option>
                                            <option @if($patient->drug)@if($patient->drug == 0) {{ 'selected' }} @endif @endif() value="0">False</option>
                                        @else
                                            <option value="1">True</option>
                                            <option {{ 'selected' }} value="0">False</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Military</label>
                                    <select class="form-control" name="millitary">
                                        <option value="">Select an option</option>
                                        @if($patient)
                                            <option @if($patient->millitary)@if($patient->millitary == 1) {{ 'selected' }} @endif @endif() value="1">True</option>
                                            <option @if($patient->millitary)@if($patient->millitary == 0) {{ 'selected' }} @endif @endif() value="0">False</option>
                                        @else
                                            <option value="1">True</option>
                                            <option {{ 'selected' }} value="0">False</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div clas="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Blood Transfusion</label>
                                    <select class="form-control" name="blood_transfusion">
                                            <option value="">Select an option</option>
                                        @if($patient)
                                            <option @if($patient->blood_transfusion)@if($patient->blood_transfusion == 1) {{ 'selected' }} @endif @endif() value="1">True</option>
                                            <option @if($patient->blood_transfusion)@if($patient->blood_transfusion == 0) {{ 'selected' }} @endif @endif() value="0">False</option>
                                        @else
                                            <option value="1">True</option>
                                            <option {{ 'selected' }} value="0">False</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Ulcer</label>
                                    <select class="form-control" name="ulcer">
                                        <option value="">Select an option</option>
                                        @if($patient)
                                            <option @if($patient->ulcer)@if($patient->ulcer == 1) {{ 'selected' }} @endif @endif() value="1">True</option>
                                            <option value="0" @if($patient->ulcer)@if($patient->ulcer == 0) {{ 'selected' }} @endif @endif()>False</option>
                                        @else
                                            <option value="1">True</option>
                                            <option {{ 'selected' }} value="0">False</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tobacco Usage</label>
                                    <select class="form-control" name="tobacco_use">
                                        <option value="">Select an option</option>
                                        @if($patient)
                                        <option value="0" @if($patient->tobacco_use)@if($patient->tobacco_use == 0) {{ 'selected' }} @endif @endif()>Never</option>
                                        <option value="1" @if($patient->tobacco_use)@if($patient->tobacco_use == 1) {{ 'selected' }} @endif @endif()>Till Date</option>
                                        <option value="2" @if($patient->tobacco_use)@if($patient->tobacco_use == 2) {{ 'selected' }} @endif @endif()>Before</option>
                                        @else
                                            <option value="0" >Never</option>
                                            <option value="1"  {{ 'selected' }}>Till Date</option>
                                            <option value="2" {{ 'selected' }} >Before</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Allergies</label>
                            <textarea name="allergies" rows="10" cols="10" class="form-control">{{ $patient->allergies ?? '' }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</section>

@endsection
