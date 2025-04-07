<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake"
        src="{{ url('/') }}/assets/admin/logo/comprehensive-orthopedic-physical-therapy-logo-somerset-nj-300x138.png"
        alt="SarjanGatePreLoader" height="60" width="60">
</div>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li id="lnkProfile" class="nav-item dropdown  position-relative">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                aria-expanded="false" title="user">
                <i class="fas fa-user"></i>
                <span class="d-none d-md-inline">{{ session('admin')['name'] }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a href="{{ route('admin.profile') }}" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item">
                    <i class="fa fa-sign-out mr-2"></i> Sign Out
                </a>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #0d1218;">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ url('/') }}/assets/admin/logo/favicon.png" alt="SarjanGate Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">CoptNJ</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ url('/') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div> --}}

        <!-- SidebarSearch Form -->
        {{-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> --}}

        {{-- <!-- Sidebar Menu --> @php
            print_r($getAdminUserFeaturePermission);
        @endphp --}}
        @if (session('admin')['role_id'] != 1)
        @endif
        <!-- Navigation for Other Admin Users -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link @yield('dashboard')">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.treatments') }}" class="nav-link @yield('treatments')">
                        <i class="nav-icon fas fa-stethoscope"></i>
                        <p>
                            Treatments
                        </p>
                    </a>
                </li>
                <li
                    class="nav-item @yield('therapys') @if (isset($Therapy)) menu-is-opening menu-open @endif">
                    <a href="{{ route('admin.therapys') }}" class="nav-link @yield('addtherapys')">
                        <i class="nav-icon fas fa-clinic-medical"></i>
                        <p>
                            Therapy
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" @if (isset($Therapy)) style="display: block" @endif>
                        <li class="nav-item">
                            <a href="{{ route('admin.therapys') }}" class="nav-link @yield('add_therapy')">
                                <i class="fa-solid fa-arrow-right nav-icon ml-1"></i>
                                <p>Add Therapy</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.therapyDetails') }}" class="nav-link @yield('therapydetails')">
                                <i class="fa-solid fa-arrow-right nav-icon ml-1"></i>
                                <p>Therapy Details</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.BlogDetails') }}" class="nav-link @yield('blog')">
                        <i class="nav-icon fas fa-blog"></i>
                        <p>
                            Blog
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.TeamDetails') }}" class="nav-link @yield('team')">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Team
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.ourLocations') }}" class="nav-link @yield('ourlocations')">
                        <i class="nav-icon fa fa-map-marker"></i>
                        <p>
                            Our Locations
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.faq') }}" class="nav-link @yield('faq')">
                        <i class="nav-icon fas fa-question"></i>
                        <p>
                            Faq
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.terms') }}" class="nav-link @yield('terms')">
                        <i class="nav-icon fas fa-warning"></i>
                        <p>
                            Terms of Use
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.privacy') }}" class="nav-link @yield('privacy')">
                        <i class="nav-icon fas fa-eye"></i>
                        <p>
                            Privacy Policy
                        </p>
                    </a>
                </li>
            </ul>
        </nav>

        <!---------------------------------------------- Navigation for Super Admin Users------------------------------------------------------------------------------------------------------>
        {{-- @else
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link @yield('dashboard')">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('roles') }}" class="nav-link @yield('role')">
                            <i class="nav-icon fa fa-tasks"></i>
                            <p>
                                Role Management
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('users') }}" class="nav-link @yield('user')">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>
                                Access Control
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('societyMembers') }}" class="nav-link @yield('society_member')">
                            &nbsp;<i class="fa-solid fa-building-user"></i>
                            <p>
                                &nbsp;&nbsp;Society Member List
                            </p>
                        </a>
                    </li>

                    <li class="nav-item @yield('society')">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-building"></i>
                            <p>
                                Society
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('society') }}" class="nav-link @yield('manage_society')">
                                    <i class="fa-solid fa-arrow-right nav-icon ml-1"></i>
                                    <p>Manage Society</p>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="{{ route('society') }}" class="nav-link @yield('manage_societys')">
                                    <i class="fa-solid fa-arrow-right nav-icon ml-1"></i>
                                    <p>Notices & News</p>
                                </a>
                            </li> --}}

        {{--   <li class="nav-item">
                                <a href="{{ route('societyUserList') }}" class="nav-link @yield('society_users')">
                                    <i class="fa-solid fa-arrow-right nav-icon ml-1"></i>
                                    <p>Society Members</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('societyUserList') }}" class="nav-link @yield('society_users')">
                                    <i class="fa-solid fa-arrow-right nav-icon ml-1"></i>
                                    <p>Events Management</p>
                                </a>
                            </li> --}}

        {{-- <li class="nav-item">
                                <a href="{{ route('block_details') }}" class="nav-link @yield('block_details')">
                                    <i class="fa-solid fa-arrow-right nav-icon ml-1"></i>
                                    <p>Block Details</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('securityGuardView') }}" class="nav-link @yield('security_guards')">
                                    <i class="fa-solid fa-arrow-right nav-icon ml-1"></i>
                                    <p>Security Guards</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('mom.index') }}" class="nav-link @yield('notice')">
                                    <i class="fa-solid fa-arrow-right nav-icon ml-1"></i>
                                    <p>Notice & MOM</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('emergencyContactView') }}" class="nav-link @yield('emergency_contact')">
                                    <i class="fa-solid fa-arrow-right nav-icon ml-1"></i>
                                    <p>Emergency Contact</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('event') }}" class="nav-link @yield('event')">
                                    <i class="fa-solid fa-arrow-right nav-icon ml-1"></i>
                                    <p>Events Management</p>
                                </a>
                            </li>
                            <li class="nav-item @yield('vehicle')">
                                <a href="#" class="nav-link">
                                    <i class="fa-solid fa-car nav-icon ml-1"></i>
                                    <p>
                                        Manage Vehicles
                                        <i class="right fas fa-angle-left nav-icon ml-1"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('parking_floor') }}" class="nav-link @yield('parking_floor')">
                                            <i class="fa-solid fa-arrow-right nav-icon ml-2"></i>
                                            <p>Parking Floors</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('parkingNumber') }}" class="nav-link @yield('parkingNumber')">
                                            <i class="fa-solid fa-arrow-right nav-icon ml-2"></i>
                                            <p>Parking Numbers</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-building"></i>
                                    <p>
                                        Society
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @yield('new_requests')">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa-solid fa-code-pull-request"></i>
                            <p>
                                New Requests
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('societyRegistrationRequest') }}"
                                    class="nav-link @yield('society_reg_req')">
                                    <i class="fa-solid fa-arrow-right nav-icon ml-1"></i>
                                    <p>Society Request</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('userRegistrationRequest') }}" class="nav-link @yield('user_reg_req')">
                                    <i class="fa-solid fa-arrow-right nav-icon ml-1"></i>
                                    <p>User Request</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('familyMemberRequest') }}" class="nav-link @yield('family_members_request')">
                                    <i class="fa-solid fa-arrow-right nav-icon ml-1"></i>
                                    <p>Family Members</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item @yield('flats_management')">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa-solid fa-building-shield"></i>
                            <p>
                                Flats Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview"> --}}
        {{-- <li class="nav-item">
                                <a href="{{ route('userRegistrationRequest') }}" class="nav-link @yield('user_reg_req')">
                                    <i class="fa-solid fa-arrow-right nav-icon ml-1"></i>
                                    <p>Society Request</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('userRegistrationRequest') }}" class="nav-link @yield('user_reg_req')">
                                    <i class="fa-solid fa-arrow-right nav-icon ml-1"></i>
                                    <p>User Request</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('familyMemberRequest') }}" class="nav-link @yield('family_members_request')">
                                    <i class="fa-solid fa-arrow-right ml-1"></i>
                                    <p>Family Members</p>
                                </a>
                            </li> --}}
        {{-- <li class="nav-item">
                                <a href="{{ route('rent_agreement.index') }}" class="nav-link @yield('rent_agreement')">
                                    <i class="fa-solid fa-arrow-right ml-4"></i>
                                    <p>Rent Agreement</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dailyhelp') }}" class="nav-link @yield('dailyhelp')">
                                    <i class="fa-solid fa-arrow-right ml-4"></i>
                                    <p>Daily Helps</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('residentServices') }}" class="nav-link @yield('residentServices')">
                                    <i class="fa-solid fa-arrow-right ml-4"></i>
                                    <p>Resident Services</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item @yield('system_setting')">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa-solid fa-gears"></i>
                            <p>
                                System Setting
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('societyRegistrationRequest') }}"
                                    class="nav-link @yield('society_gate')">
                                    <i class="fa-solid fa-arrow-right nav-icon ml-1"></i>
                                    <p>Society Gate</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('helpdeskView') }}" class="nav-link @yield('HelpDesk')">
                            <i class="fa-solid fa fa-headphones nav-icon ml-1"></i>
                            <p>Help Desk</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logList') }}" class="nav-link @yield('log')">
                            <i class="fa-solid fa-arrow-right nav-icon ml-1"></i>
                            <p>Logs</p>
                        </a>
                    </li>

                </ul>
            </nav>
        @endif  --}}
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
