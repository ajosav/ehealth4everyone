<!-- Brand Logo -->
<a href="index3.html" class="brand-link navbar-teal">
    <img src="{{asset('images/logo/logo.jpeg')}}" alt="Ehealth4everyone" class="brand-image img-circle elevation-3"
        style="opacity: .8">
    <span class="brand-text font-weight-light">E-Health</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{asset('images/logo/human_avatar.png')}}" class="img-circle elevation-2" alt="image">
        </div>
        <div class="info">
            <a href="#" class="d-block text-truncate">{{auth()->user()->name}}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
           
            <li class="nav-item">
                <a href="{{url('/dashboard')}}" class="nav-link {{Request::is('dashboard') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-chart-line"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link 
                    @if(Request::is('dashboard/manage_profile/*') || Request::is('dashboard/profile/*')) 
                        active 
                    @else 
                    
                    @endif
                ">
                    <i class="nav-icon fas fa-id-badge"></i>
                    <p>
                        Profile
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @can('doctor', auth()->user())
                        @if(!$doctor_profile)
                            <li class="nav-item">
                                <a href="{{route('manage_profile.create')}}" class="nav-link {{Request::is('dashboard/manage_profile/create') ? 'active' : ''}}">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Create Profile</p>
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{route('manage_profile.show', auth()->user()->uuid)}}" class="nav-link {{Request::is('dashboard/manage_profile/*') ? 'active' : ''}}">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>View/Edit Profile</p>
                                </a>
                            </li>
        
                        @endif
                        
                    @elsecan('patient', auth()->user())
                        @if(!$patient_profile)
                            <li class="nav-item">
                                <a href="{{route('profile.create')}}" class="nav-link {{Request::is('dashboard/profile/create') ? 'active' : ''}}">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Create Profile</p>
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{route('profile.show')}}" class="nav-link {{Request::is('dashboard/manage_profile/create') ? 'active' : ''}}">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>View/Edit Profile</p>
                                </a>
                            </li>
                        @endif
                
                    @endcan
                    
                </ul>
            </li>
            @can('doctor', auth()->user())
                <li class="nav-item">
                    <a href="{{url('dashboard/department')}}" class="nav-link {{Request::is('dashboard/department') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Departments
                        </p>
                    </a>
                </li>
            @endcan
            </li>
            
            <li class="nav-item">
                <a href="{{url('dashboard/appointment')}}" class="nav-link {{Request::is('dashboard/appointment') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-calendar"></i>
                    <p>
                        Appointments
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-history"></i>
                    <p>
                        Transaction History
                    </p>
                </a>
            </li>
           
        </ul>
       
    </nav>
   
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->