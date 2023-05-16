@php
$app_logo = App\Models\Setting::first();
@endphp
<nav class="border-gray-200 sm:px-4 py-2.5 rounded border-b border-slate shadow-lg p-4">
    <div class="msm:mx-0 xsm:mx-0 xxsm:mx-0 xlg:mx-20 2xl:mx-20">
        <div class="flex flex-wrap items-center justify-between mx-auto">
            <a href="{{ url('/') }}" class="flex items-center ml-2">
                <img src="{{ $app_logo->logo }}" class="" alt="Doctro Logo" style="height:3.9rem;" />
            </a>
            <div class="flex items-center md:order-2">
                @php
                $notifications = App\Models\RegisterNotification::get();
                if (Auth::check()){
                if (auth()->user()->language) {
                $lang_name = Auth::user()->language;
                $lang_image = App\Models\Language::where('name', $lang_name)->first()->image;
                }
                else{
                $lang_name = 'English';
                $lang_image = "English.png";
                }
                }
                else
                {
                $icon = \App\Models\Language::where('name',session('locale'))->first();
                if($icon)
                {
                $lang_name = session('locale');
                $lang_image = $icon->image;
                }
                else
                {
                $lang_name = 'English';
                $lang_image = "English.png";
                }
                }
                $languages = App\Models\Language::where('status',1)->get();
                @endphp
                <!-- <button type="button" data-dropdown-toggle="language-dropdown-menu" class="inline-flex items-center justify-center px-4 py-2 text-sm text-gray-500 rounded-lg cursor-pointer">
                    <img src="{{asset('images/upload/'.$lang_image)}}" class="w-5 h-5 mr-2 rounded-full" alt="">
                    {{ $lang_name }}
                </button> -->

                <div class="z-50 hidden my-4 text-base list-none divide-y divide-gray-100 rounded-lg shadow bg-white" id="language-dropdown-menu">
                    <ul class="py-2" role="none">

                        @foreach ($languages as $language)
                        <li>
                            <a href="{{ url('select_language',$language->id) }}" class="block px-4 py-2 text-sm text-black-700" role="menuitem">
                                <div class="inline-flex items-center">
                                    <img alt="Image placeholder" src=" {{asset('images/upload/'.$language->image)}}" class="h-3.5 w-3.5 rounded-full mr-2">
                                    {{ $language->name }}
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="flex items-center relative">
                    <div style="position:relative;right:30px;">
                    </div>

                    @if (auth()->check())

                    <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName" class="flex items-center text-sm font-medium text-gray-900 rounded-full hover:text-blue-600 dark:hover:text-blue-500 md:mr-0 dark:text-white" type="button">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 mr-2 rounded-full" src="{{ url('images/upload/'.auth()->user()->image) }}" alt="user photo">
                        {{ auth()->user()->name }}
                        <svg class="w-4 h-4 mx-1.5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>






                    <div id="dropdownAvatarName" class="bg-white z-10 hidden divide-y divide-gray-100 rounded-lg shadow w-44  dark:divide-gray-600">
                        <ul class=" py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
                            <li>
                                <a href="{{ url('user_profile') }}" class="block px-4 py-2">{{ __('Dashboard') }}</a>
                            </li>
                        </ul>
                        <div class="py-2">
                            <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-sm ">{{ __('Sign out') }}</a>
                        </div>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @else
                    <div class="mt-auto mb-auto ml-3 xxsm:ml-0">
                        <a href="{{url('/patient-login')}}" data-te-ripple-init data-te-ripple-color="light" class="rounded-none bg-purple tracking-wide px-4 py-2 text-white font-fira-sans font-normal text-sm">{{__('Sign In')}}</a>
                    </div>
                    @endif
                </div>

                <button data-collapse-toggle="mobile-menu-language-select" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden xxsm:block hover:bg-gray-100" aria-controls="mobile-menu-language-select" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" fill="currentColor" aria-hidden="true" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            <div class="items-center justify-between w-full md:flex md:w-auto md:order-1" id="mobile-menu-language-select">
                <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0">

                    <li>
                        <a href="{{url('/')}}" class="{{ $activePage == 'home' ? 'text-purple' : 'text-black' }} f-18 font-fira-sans block py-2 pl-3 pr-4 rounded md:bg-transparent md:p-0" aria-current="page">{{ __('Home') }}</a>
                    </li>
                    <!-- <li>
                        <a href="#" class="{{ $activePage == 'about' ? 'text-purple' : 'text-black' }} f-18 font-fira-sans block py-2 pl-3 pr-4 rounded md:bg-transparent md:p-0" aria-current="page">{{ __('About') }}</a>
                    </li> -->
                    <li>
                        <a href="{{url('/show-doctors')}}" class="{{ $activePage == 'doctors' ? 'text-purple' : 'text-black' }} f-18 font-fira-sans block py-2 pl-3 pr-4 rounded md:bg-transparent md:p-0" aria-current="page">{{ __('Find Doctors') }}</a>
                    </li>
                    <li>
                        <a href="{{url('/our_blogs')}}" class="{{ $activePage == 'ourblogs' ? 'text-purple' : 'text-black' }} f-18 block py-2 font-fira-sans pl-3 pr-4 rounded md:bg-transparent md:p-0">{{ __('Blog') }}</a>
                    </li>
                    <li>
                        <a href="{{url('/contact_us')}}" class="{{ $activePage == 'contactus' ? 'text-primary' : 'text-black' }} f-18 block py-2 font-fira-sans pl-3 pr-4 rounded md:bg-transparent md:p-0">{{ __('Contact Us') }}</a>
                    </li>
                    <li>
                        <a href="{{url('/about-us')}}" class="{{ $activePage == 'aboutus' ? 'text-primary' : 'text-black' }} f-18 block py-2 font-fira-sans pl-3 pr-4 rounded md:bg-transparent md:p-0">{{ __('About Us') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
