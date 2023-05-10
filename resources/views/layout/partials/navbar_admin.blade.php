@php
$app_logo = App\Models\Setting::first();
@endphp
@if (auth()->user()->hasRole('super admin'))
<nav class="navbar navbar-expand-lg main-navbar " style="background-color:#19376D;">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="javascript:void(0)" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </form>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="notification">
            <div class="number"> <small class="notification-count">2</small></div>
            <div class="notBtn " href="#">
                <i class="fas fa-bell text-white"></i>
                <div class="box">
                    <div class="display">
                        <div class="cont">
                            <div class="sec new">
                                <a href="https://codepen.io/Golez/">
                                    <div class="profCont">
                                        <img class="profile" src="https://c1.staticflickr.com/5/4007/4626436851_5629a97f30_b.jpg">
                                    </div>
                                    <div class="txt">James liked your post: "Pure css notification box"</div>
                                    <div class="txt sub">11/7 - 2:30 pm</div>
                                </a>
                            </div>
                            <div class="sec new">
                                <a href="https://codepen.io/Golez/">
                                    <div class="profCont">
                                        <img class="profile" src="https://obamawhitehouse.archives.gov/sites/obamawhitehouse.archives.gov/files/styles/person_medium_photo/public/person-photo/amanda_lucidon22.jpg?itok=JFPi8OFJ">
                                    </div>
                                    <div class="txt">Annita liked your post: "Pure css notification box"</div>
                                    <div class="txt sub">11/7 - 2:13 pm</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li class="dropdown"><a href="javascript:void(0)" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <div class="d-sm-none d-lg-inline-block">{{ auth()->user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                @if(auth()->user()->hasRole('super admin'))
                <a href="{{ url('profile') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> {{ __('Profile') }}
                </a>
                <a href="{{ url('setting') }}" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> {{ __('Settings') }}
                </a>
                @endif
                @if(auth()->user()->hasRole('pharmacy'))
                @can('pharmacy_profile')
                <a class="dropdown-item has-icon" href="{{ url('pharmacy_profile') }}"><i class="far fa-user"></i> {{ __('Profile') }}</a>
                @endcan
                @can('pharmacy_profile')
                <a class="dropdown-item has-icon" href="{{ url('changePassword') }}"><i class="fas fa-unlock-alt"></i> {{__('change password')}}</a>
                @endcan
                @endif
                @if (auth()->user()->hasRole('doctor'))
                @can('doctor_profile')
                <a class="dropdown-item" href="{{ url('doctor_profile') }}"><i class="far fa-user"></i> {{ __('Profile') }}</a>
                @endcan
                @can('doctor_profile')
                <a class="dropdown-item" href="{{ url('changePassword') }}"><i class="fas fa-unlock-alt"></i> {{__('change password')}}</a>
                @endcan
                @endif
                @if (auth()->user()->hasRole('laboratory'))
                <a class="dropdown-item" href="{{ url('lab_profile') }}"><i class="far fa-user"></i> {{ __('Profile') }}</a>
                <a class="dropdown-item" href="{{ url('changePassword') }}"><i class="fas fa-unlock-alt"></i> {{__('change password')}}</a>
                @endif
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                </a>
            </div>
        </li>
    </ul>
</nav>













<!-- <nav class="navbar navbar-expand-lg main-navbar " style="background-color:#19376D;">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="javascript:void(0)" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </form>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    <ul class="navbar-nav navbar-right">
        <div class="mt-5">
            @php
            $languages = App\Models\Language::where('status',1)->get();
            $icon = \App\Models\Language::where('name',session('locale'))->first();
            if($icon)
            {
            $lang_image = $icon->image;
            }
            else
            {
            $lang_image = "/english.png";
            }
            @endphp
        </div>
        <li class="dropdown"><a href="javascript:void(0)" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <div class="d-sm-none d-lg-inline-block">{{ auth()->user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                @if(auth()->user()->hasRole('super admin'))
                <a href="{{ url('profile') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> {{ __('Profile') }}
                </a>
                <a href="{{ url('setting') }}" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> {{ __('Settings') }}
                </a>
                @endif
                @if(auth()->user()->hasRole('pharmacy'))
                @can('pharmacy_profile')
                <a class="dropdown-item has-icon" href="{{ url('pharmacy_profile') }}"><i class="far fa-user"></i> {{ __('Profile') }}</a>
                @endcan
                @can('pharmacy_profile')
                <a class="dropdown-item has-icon" href="{{ url('changePassword') }}"><i class="fas fa-unlock-alt"></i> {{__('change password')}}</a>
                @endcan
                @endif
                @if (auth()->user()->hasRole('doctor'))
                @can('doctor_profile')
                <a class="dropdown-item" href="{{ url('doctor_profile') }}"><i class="far fa-user"></i> {{ __('Profile') }}</a>
                @endcan
                @can('doctor_profile')
                <a class="dropdown-item" href="{{ url('changePassword') }}"><i class="fas fa-unlock-alt"></i> {{__('change password')}}</a>
                @endcan
                @endif
                @if (auth()->user()->hasRole('laboratory'))
                <a class="dropdown-item" href="{{ url('lab_profile') }}"><i class="far fa-user"></i> {{ __('Profile') }}</a>
                <a class="dropdown-item" href="{{ url('changePassword') }}"><i class="fas fa-unlock-alt"></i> {{__('change password')}}</a>
                @endif
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                </a>
            </div>
        </li>
    </ul>
</nav> -->





@elseif(auth()->user()->hasRole('doctor'))
<nav class="navbar navbar-expand-lg main-navbar" style="background-color:#0B2447; padding:2rem;">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="javascript:void(0)" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </form>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    <ul class="navbar-nav navbar-right">
        <div class="mt-5">
            @php
            $languages = App\Models\Language::where('status',1)->get();
            $icon = \App\Models\Language::where('name',session('locale'))->first();
            if($icon)
            {
            $lang_image = $icon->image;
            }
            else
            {
            $lang_image = "/english.png";
            }
            @endphp
        </div>
        <li class="dropdown"><a href="javascript:void(0)" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <div class="d-sm-none d-lg-inline-block" style="font-size:18px;">{{ auth()->user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                @if(auth()->user()->hasRole('super admin'))
                <a href="{{ url('profile') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> {{ __('Profile') }}
                </a>
                <a href="{{ url('setting') }}" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> {{ __('Settings') }}
                </a>
                @endif
                @if(auth()->user()->hasRole('pharmacy'))
                @can('pharmacy_profile')
                <a class="dropdown-item has-icon" href="{{ url('pharmacy_profile') }}"><i class="far fa-user"></i> {{ __('Profile') }}</a>
                @endcan
                @can('pharmacy_profile')
                <a class="dropdown-item has-icon" href="{{ url('changePassword') }}"><i class="fas fa-unlock-alt"></i> {{__('change password')}}</a>
                @endcan
                @endif
                @if (auth()->user()->hasRole('doctor'))
                @can('doctor_profile')
                <a class="dropdown-item" href="{{ url('doctor_profile') }}"><i class="far fa-user"></i> {{ __('Profile') }}</a>
                @endcan
                @can('doctor_profile')
                <a class="dropdown-item" href="{{ url('changePassword') }}"><i class="fas fa-unlock-alt"></i> {{__('change password')}}</a>
                @endcan
                @endif
                @if (auth()->user()->hasRole('laboratory'))
                <a class="dropdown-item" href="{{ url('lab_profile') }}"><i class="far fa-user"></i> {{ __('Profile') }}</a>
                <a class="dropdown-item" href="{{ url('changePassword') }}"><i class="fas fa-unlock-alt"></i> {{__('change password')}}</a>
                @endif
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                </a>
            </div>
        </li>
    </ul>
</nav>
<!-- <nav class="navbar navbar-expand-lg main-navbar" style="background-color:#62d2a2; padding:2rem;">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="javascript:void(0)" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </form>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    <ul class="navbar-nav navbar-right">
        <div class="mt-5">
            @php
            $languages = App\Models\Language::where('status',1)->get();
            $icon = \App\Models\Language::where('name',session('locale'))->first();
            if($icon)
            {
            $lang_image = $icon->image;
            }
            else
            {
            $lang_image = "/english.png";
            }
            @endphp
        </div>
        <li class="dropdown"><a href="javascript:void(0)" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <div class="d-sm-none d-lg-inline-block" style="font-size:18px;">{{ auth()->user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                @if(auth()->user()->hasRole('super admin'))
                <a href="{{ url('profile') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> {{ __('Profile') }}
                </a>
                <a href="{{ url('setting') }}" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> {{ __('Settings') }}
                </a>
                @endif
                @if(auth()->user()->hasRole('pharmacy'))
                @can('pharmacy_profile')
                <a class="dropdown-item has-icon" href="{{ url('pharmacy_profile') }}"><i class="far fa-user"></i> {{ __('Profile') }}</a>
                @endcan
                @can('pharmacy_profile')
                <a class="dropdown-item has-icon" href="{{ url('changePassword') }}"><i class="fas fa-unlock-alt"></i> {{__('change password')}}</a>
                @endcan
                @endif
                @if (auth()->user()->hasRole('doctor'))
                @can('doctor_profile')
                <a class="dropdown-item" href="{{ url('doctor_profile') }}"><i class="far fa-user"></i> {{ __('Profile') }}</a>
                @endcan
                @can('doctor_profile')
                <a class="dropdown-item" href="{{ url('changePassword') }}"><i class="fas fa-unlock-alt"></i> {{__('change password')}}</a>
                @endcan
                @endif
                @if (auth()->user()->hasRole('laboratory'))
                <a class="dropdown-item" href="{{ url('lab_profile') }}"><i class="far fa-user"></i> {{ __('Profile') }}</a>
                <a class="dropdown-item" href="{{ url('changePassword') }}"><i class="fas fa-unlock-alt"></i> {{__('change password')}}</a>
                @endif
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                </a>
            </div>
        </li>
    </ul>
</nav> -->
@endif
