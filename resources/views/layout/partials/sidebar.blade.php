<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
@php
$app_logo = App\Models\Setting::first();
@endphp
@if (auth()->user()->hasRole('super admin'))
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/home') }}">
                <img src="{{asset('logo/twslogo.png')}}" width="180" height="45" alt="Logo" style="object-fit: contain;">
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            @if (auth()->user()->hasRole('super admin'))
            <!-- <a href="{{ url('/home') }}">
                <img src="{{App\Models\Setting::find(1)->favicon}}" width="50" height="50" alt="Logo">
            </a> -->
            <!-- Doctor Panel -->
            @elseif(auth()->user()->hasRole('doctor'))
            <a href="{{ url('/doctor_home') }}">
                <img src="{{App\Models\Setting::find(1)->favicon}}" width="50" height="50" alt="Logo">
            </a>
            @elseif(auth()->user()->hasRole('pharmacy'))
            <a href="{{ url('/pharmacy_home') }}">
                <img src="{{App\Models\Setting::find(1)->favicon}}" width="50" height="50" alt="Logo">
            </a>
            @elseif(auth()->user()->hasRole('laboratory'))
            <a href="{{ url('/pathologist_home') }}">
                <img src="{{App\Models\Setting::find(1)->favicon}}" width="50" height="50" alt="Logo">
            </a>
            @endif
        </div>

        <ul class="sidebar-menu">
            <li class="{{ $activePage == 'home' ? 'active' : '' }}">
                <a href="{{ url('home') }}">
                    <i class="fas fa-home"></i>
                    <span>{{__('Dashboard')}}</span>
                </a>
            </li>
            <li class="{{ $activePage == 'appointment' ? 'active' : '' }}">
                <a href="{{ url('appointment') }}" class="doctorsidebar-text">
                    <i class="far fa-calendar-check"></i>
                    <span>{{__('appointment')}}</span>
                </a>
            </li>
            <li class="{{ $activePage == 'medicines' ? 'active' : '' }}">
                <a href="{{ url('medicines') }}">
                    <i class="fas fa-capsules"></i>
                    <span>{{__('Medicine')}}</span>
                </a>
            </li>
            <li class="{{ $activePage == 'medicineCategory' ? 'active' : '' }}">
                <a href="{{ url('medicineCategory') }}">
                    <i class="fas fa-tablets"></i>
                    <span>{{__('Medicine Type')}}</span>
                </a>
            </li>
            <li class="{{ $activePage == 'treatments' ? 'active' : '' }}">
                <a href="{{ url('treatments') }}">
                    <i class="fas fa-stethoscope"></i>
                    <span>{{__('Treatments')}}</span>
                </a>
            </li>

            @can('category_access')
            <li class="{{ $activePage == 'category' ? 'active' : '' }}">
                <a href="{{ url('category') }}">
                    <i class="far fa-list-alt"></i>
                    <span>{{__('category')}}</span>
                </a>
            </li>
            @endcan
            @can('expertise_access')
            <li class="{{ $activePage == 'expertise' ? 'active' : '' }}">
                <a href="{{ url('expertise') }}">
                    <i class="fas fad fa-medal"></i>
                    <span>{{__('expertise')}}</span>
                </a>
            </li>
            @endcan
            @can('hospital_access')
            <li class="{{ $activePage == 'hospital' ? 'active' : '' }}">
                <a href="{{ url('hospital') }}">
                    <i class="far fa-hospital"></i>
                    <span>{{__('hospital')}}</span>
                </a>
            </li>
            <li class="{{ $activePage == 'pharmacy' ? 'active' : '' }}">
                <a href="{{ url('pharmacy') }}">
                    <i class="fas fa-prescription-bottle"></i>
                    <span>{{__('Pharmacy')}}</span>
                </a>
            </li>
            @endcan
            @can('doctor_access')
            <li class="{{ $activePage == 'doctor' ? 'active' : '' }}">
                <a href="{{ url('doctor') }}">
                    <i class="fas fa-user-md"></i>
                    <span>{{__('doctor')}}</span>
                </a>
            </li>
            @endcan
            @if(auth()->user()->can('patient_access') || auth()->user()->can('admin_user_access'))
            {{-- @canAny(['patient_access,admin_user_access']) --}}
            <li class="{{ $activePage == 'patients' ? 'active' : '' }} || {{ $activePage == 'admin_users' ? 'active' : '' }}">
                <a href="javascript:void(0)" class="nav-link has-dropdown">
                    <i class="fas fa-user-injured"></i>
                    <span>{{__('Users')}}</span>
                </a>
                <ul class="dropdown-menu">
                    @can('admin_user_access')
                    <li class="{{ $activePage == 'admin_users' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('admin_users') }}">{{__('Admin users')}}</a>
                    </li>
                    @endcan
                    @can('patient_access')
                    <li class="{{ $activePage == 'patients' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('patient') }}">{{__('Patient')}}</a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endif
            @can('blog_access')
            <li class="{{ $activePage == 'blog' ? 'active' : '' }}">
                <a href="{{ url('blog') }}">
                    <i class="fas fa-clipboard-list"></i>
                    <span>{{__('blog')}}</span>
                </a>
            </li>
            @endcan

            <li class="{{ $activePage == 'banner' ? 'active' : '' }}">
                <a href="{{ url('banner') }}">
                    <i class="fas fa-angle-double-right"></i>
                    <span>{{__('banner')}}</span>
                </a>
            </li>
            @if (Gate::check('doctor_review'))
            @if (auth()->user()->hasRole('doctor'))
            <li class="{{ $activePage == 'review' ? 'active' : '' }}">
                <a href="{{ url('doctor_review') }}">
                    <i class="fas fa-star"></i>
                    <span>{{__('Reviews')}}</span>
                </a>
            </li>
            @endif
            @endif
            @can('role_access')
            <li class="{{ $activePage == 'role' ? 'active' : '' }}">
                <a href="{{ url('role') }}">
                    <i class="fas fa-user-tag"></i>
                    <span>{{__('Permissions')}}</span>
                </a>
            </li>
            @endcan
            @can('report_access')
            <li class="{{ $activePage == 'user_report' ? 'active' : '' }} || {{ $activePage == 'doctor_report' ? 'active' : '' }}">
                <a href="javascript:void(0)" class="nav-link has-dropdown">
                    <i class="fas fa-file-alt"></i>
                    <span>{{__('Reports')}}</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ $activePage == 'user_report' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('user_report') }}">{{__('User Report')}}</a>
                    </li>
                    <li class="{{ $activePage == 'doctor_report' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('doctor_report') }}">{{__('Doctor Report')}}</a>
                    </li>
                </ul>
            </li>
            @endcan

            @can('superadmin_setting')
            <li class="{{ $activePage == 'setting' ? 'active' : '' }}">
                <a href="{{ url('setting') }}">
                    <i class="fas fa-cogs"></i>
                    <span>{{__('settings')}}</span>
                </a>
            </li>
            @endcan

            {{-- Doctor --}}
            @if (auth()->user()->hasRole('doctor'))
            @can('doctor_schedule')
            <!-- <li class="{{ $activePage == 'schedule' ? 'active' : '' }}">
                <a href="{{ url('schedule') }}">
                    <i class="fas fa-hourglass-start"></i>
                    <span>{{__('Schedule Timings')}}</span>
                </a>
            </li> -->
            @endcan
            @endif
            @if (auth()->user()->hasRole('doctor'))
            @can('zoom_setting')
            <li class="{{ $activePage == 'setting' ? 'active' : '' }}">
                <a href="{{ url('list') }}">
                    <i class="fas fa-cog"></i>
                    <span>{{__('Zoom Setting')}}</span>
                </a>
            </li>
            @endcan
            @endif

            {{-- Pharmacy --}}
            @if (auth()->user()->hasRole('pharmacy'))
            @can('pharmacy_dashboard')
            <li class="{{ $activePage == 'home' ? 'active' : '' }}">
                <a href="{{ url('pharmacy_home') }}">
                    <i class="fas fe fe-home"></i>
                    <span>{{__('Dashboard')}}</span>
                </a>
            </li>
            @endcan

            @can('medicine_access')
            <li class="{{ $activePage == 'medicine' ? 'active' : '' }}">
                <a href="{{ url('medicines') }}">
                    <i class="fas fa-capsules"></i>
                    <span>{{__('Medicine')}}</span>
                </a>
            </li>

            @endcan


            @can('pharmacy_purchase_medicine')
            <li class="{{ $activePage == 'purchase' ? 'active' : '' }}">
                <a href="{{ url('purchased_medicines') }}">
                    <i class="far fa-money-bill-alt"></i>
                    <span>{{__('Purchased Medicines')}}</span>
                </a>
            </li>
            @endcan

            @can('pharmacy_schedule')
            <li class="{{ $activePage == 'pharmacy_schedule' ? 'active' : '' }}">
                <a href="{{ url('pharmacy_schedule') }}">
                    <i class="fas fa-hourglass-start"></i>
                    <span>{{__('Schedule Timings')}}</span>
                </a>
            </li>
            @endcan

            @can('pharmacy_commission_access')
            <li class="{{ $activePage == 'commission' ? 'active' : '' }}">
                <a href="{{ url('pharmacyCommission') }}">
                    <i class="far fa-money-bill-alt"></i>
                    <span>{{__('Commission Details')}}</span>
                </a>
            </li>

            @endcan
            @endif
        </ul>
    </aside>
</div>
@endif






<!-- Doctors Panel Side bar -->
@php
$app_logo = App\Models\Setting::first();
@endphp
@if (auth()->user()->hasRole('doctor'))
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/doctor_home') }}">
                <img src="{{asset('logo/twslogo.png')}}" width="80" height="45" alt="Logo">
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ $activePage == 'home' ? 'doctorsidebar-active' : 'doctorsidebar-notactive' }}">
                <a href="{{ url('doctor_home') }}" class="doctorsidebar-text">
                    <i class="fas fe fe-home"></i>
                    <span>{{__('Dashboard')}}</span>
                </a>
            </li>
            <li class="{{ $activePage == 'appointment' ? 'doctorsidebar-active' : 'doctorsidebar-notactive' }}">
                <a href="{{ url('appointment') }}" class="doctorsidebar-text">
                    <i class="far fa-calendar-check"></i>
                    <span>{{__('appointment')}}</span>
                </a>
            </li>
            <li class="{{ $activePage == 'schedule' ? 'doctorsidebar-active' : 'doctorsidebar-notactive' }}">
                <a href="{{ url('schedule') }}" class="doctorsidebar-text">
                    <i class="fas fa-hourglass-start"></i>
                    <span>{{__('Schedule')}}</span>
                </a>
            </li>
            <li class="{{ $activePage == 'review' ? 'active' : '' }}">
                <a href="{{ url('doctor_review') }}">
                    <i class="fas fa-star"></i>
                    <span>{{__('Reviews')}}</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
@endif
<!-- Doctor Panel Side bar end  -->
