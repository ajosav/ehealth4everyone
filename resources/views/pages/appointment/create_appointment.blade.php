@extends('layouts.ehealth')

@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>
            Book an Appointment
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Appointment</li>
          </ol>
        </div>
      </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      {{-- @can('patient', auth()->user()) --}}
        <div class="card card-default collapsed-card">
          <div class="card-header">
            <h3 class="card-title">Book New Appointment</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <book-appointment></book-appointment>
        </div>
      {{-- @endcan --}}
      <!-- /.card -->

      <!-- SELECT2 EXAMPLE -->
      <all-appointments></all-appointments>

    </div><!-- /.container-fluid -->
</section>



@endsection