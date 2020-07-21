<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>EHealth|Hospital</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="msapplication-tap-highlight" content="no">

        <link rel="icon" type="image/png" href="{{asset('images/logo/logo.jpeg')}}" />
        @include('includes.vendor_css')
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
        <script src="{{ asset('vendor/pace/pace.js') }}"></script>
        
        <script type="text/javascript" src="{{asset('vendor/tinymce/js/tinymce/tinymce.min.js') }}"></script>



        <style>

            .pace {
                -webkit-pointer-events: none;
                pointer-events: none;
            
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }
            
            .pace-inactive {
                display: none;
            }
            
            .pace .pace-progress {
                background: rgb(222, 246, 0);
                position: fixed;
                z-index: 2000;
                top: 0;
                right: 100%;
                width: 100%;
                height: 2px;
            }
            
            .modal-backdrop {
                background: #388E3C;
            }

            .dark-primary-color    { background: #388E3C; }
            .default-primary-color { background: #4CAF50; color: #ffffff}
            .light-primary-color   { background: #C8E6C9; }
            .text-primary-color    { color: #FFFFFF; }
            .accent-color          { background: #9E9E9E; }
            .primary-text-color    { color: #212121; }
            .secondary-text-color  { color: #757575; }
            .divider-color         { border-color: #BDBDBD; }
        </style>


    </head>

    <body class="hold-transition sidebar-mini">
        <div class="wrapper" id="app">
            @if(Session::has('success'))
                <info-success message="{{ Session::get('success') }} "></info-success>
            @endif
            @if(Session::has('fail'))
                <info-error message="{{ Session::get('fail') }} "></info-error>
            @endif
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-dark navbar-teal text-sm">
                {{-- Navigation goes here --}}
                @include('layouts.partials.header')
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar elevation-4 sidebar-light-green">
                {{-- Sidebar starts here --}}
                @include('layouts.partials.sidebar')
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @yield('content')
                
            </div>
            <!-- /.content-wrapper -->


            <form id="logout-form" action="{{route('logout')}}" method="post" style="display: none">
                @csrf
            </form>
            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="float-right d-none d-sm-inline">
                    Ehealth4EveryOne
                </div>
                <!-- Default to the left -->
                <strong>Copyright &copy; 2020 <a href="https://github.com/ajosav">Joshua Adebayo</a>.</strong> All rights reserved.
            </footer>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->

        
        @if(!request()->session()->has('user_notify') || !request()->session()->get('user_notify') == auth()->user()->uuid)
        @can('doctor', auth()->user())
        @if(!$doctor_profile)                      
        <div class="modal fade" id="welcome_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Create Your Profile</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Welcome. <b>{{auth()->user()->name}}</b> You need to create a profile for patients to be able to find you. <a href="{{route('manage_profile.create')}}">Click here </a> to create your profile now
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    @endif
                    
                    @elsecan('patient', auth()->user())
                    @if(!$patient_profile)
                    <div class="modal fade show" id="welcome_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Create Your Profile</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Welcome. {{auth()->user()->name}} You need to create a profile for doctors to be able to know you. <a href="{{route('profile.create')}}">Click here </a> to create your profile now
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    
                    @endcan
                        {{session(['user_notify' => auth()->user()->uuid])}}
                    @endif

                    @auth
                    <script>
                        window.user = @json(auth()->user());
                        </script>
                    @endauth
                    <script src="{{ mix('js/app.js') }}" rel="stylesheet"></script>
                    @include('includes.vendor_js')
                    
                    <script>
                        
                        $(document).ready(function(){
                            $("#welcome_modal").modal('show');
                            

                $('#start_time').datetimepicker({
                //     inline:false,
                //     onGenerate: function () {
                //         $('#start_time').val = $('#start_time').datetimepicker()
                //     },
                });
                $('#stop_time').datetimepicker({
                //     inline:false,
                //     onGenerate: function () {
                //         $('#stop_time').val = $('#stop_time').datetimepicker()
                //     },
                });
            });
        </script>
        @yield('scripts')
     
        {{-- <!-- jQuery -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.min.js"></script> --}}
    </body>
</html>
