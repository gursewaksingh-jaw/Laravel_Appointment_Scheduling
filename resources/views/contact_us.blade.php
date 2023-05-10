@extends('layout.mainlayout',['activePage' => 'contactus'])
@section('content')
@section('css')
<link rel="stylesheet" href="{{ url('assets/css/intlTelInput.css') }}" />
<style>
    .signupDiv.active {
        border-color: var(--site_color);
    }

    .signupDiv.active div {
        border: var(--site_color);
    }

    .signupDiv.active label {
        color: black
    }

    .nav-tabs .nav-item .nav-link.active {
        border: 1px solid var(--site_color) !important;
        color: black !important;
    }

    .iti {
        display: block !important;
    }

    .hide {
        display: none;
    }

    /* .contentDisplay .active
    {
        display: block;
    } */
</style>
@endsection

@section('content')
<div class="xl:w-3/4 mx-auto">
    <div class="flex justify-between pt-20 pb-20 gap-10 lg:flex-row xxsm:flex-col xxsm:mx-5 xl:mx-0 2xl:mx-0">
        <div class="bg-slate-100 2xl:w-2/4 xxsm:w-full">
            <h1 class="font-fira-sans leading-10 font-medium text-3xl px-5 p-5 ml-5">{{__('Get in touch')}}</h1>
            <div class="">
                <img src="{{asset('svg/doctors2.svg')}}" class="mt-20" alt="">
            </div>
        </div>

        <div class="2xl:w-6/6 xxsm:w-full">
            <h1 class="font-fira-sans leading-10 font-normal text-3xl">{{__('Contact Us ')}}</h1>
            <div class="pt-5 flex">
                @if (old('from'))
                @if (old('from') == 'doctor')
                @php
                $active = 'doctor';
                @endphp
                @else
                @php
                $active = 'patient';
                @endphp
                @endif
                @else
                @php
                $active = 'patient';
                @endphp
                @endif
            </div>
            <div class="tab-content contentDisplay" id="tabs-tabContent">
                <div class="patientDiv">
                    <form action="{{ url('/contactus/message') }}" method="post">
                        <input type="hidden" name="from" value="patient">
                        @csrf
                        <div class="pt-3">
                            <label class="font-fira-sans text-black text-sm font-normal">{{__('Name')}}</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="@error('name') is-invalid @enderror w-full text-sm font-fira-sans text-gray block p-2 z-20 border border-white-light" placeholder="Enter patient name">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="pt-3">
                            <label for="email" class="font-fira-sans text-black text-sm font-normal">{{__('Email')}}</label>
                            <input type="text" name="email" value="{{ old('email') }}" class="@error('email') is-invalid @enderror  w-full text-sm font-fira-sans text-gray block p-2 z-20 border border-white-light" placeholder="Enter email">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="pt-3">
                            <label for="phone" class="font-fira-sans text-black text-sm font-normal">{{__('Phone Number')}}</label>
                            <input type="tel" name="phone" value="{{ old('phone') }}" class="@error('phone') is-invalid @enderror w-full text-sm font-fira-sans text-gray block p-2 z-20 border border-white-light phone">
                            <input type="hidden" name="phone_code" value="+91">
                            @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="pt-3">
                            <label for="phone" class="font-fira-sans text-black text-sm font-normal">{{__('Message')}}</label>
                            <div class="relative mb-3" data-te-input-wrapper-init>
                                <textarea name="message" class="text-dark peer block min-h-[auto] w-full rounded border-0"></textarea>
                            </div>
                            @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="pt-3">
                            <button type="submit" class="font-fira-sans text-white bg-primary w-full text-sm font-normal py-3">{{__('Submit')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ url('assets/js/intlTelInput.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.signupDiv').click(function() {
            $('.signupDiv').removeClass('active');
            $(this).addClass('active');
            $(this).children('input[type=radio]').prop('checked', true);
            var radioVal = $(this).children('input[type=radio]').val();
            $('.invalid-feedback').text('');
            if (radioVal == 'doctor') {
                $('.doctorDiv').show();
                $('.patientDiv').hide();
            }
            if (radioVal == 'patient') {
                $('.doctorDiv').hide();
                $('.patientDiv').show();
            }
        });
    });
    const phoneInputField = document.querySelector(".phone");
    const phoneInput = window.intlTelInput(phoneInputField, {
        preferredCountries: ["us", "co", "in", "de"],
        initialCountry: "in",
        separateDialCode: true,
        utilsScript: "{{url('assets/js/utils.js')}}",
    });
    phoneInputField.addEventListener("countrychange", function() {
        var phone_code = $('.phone').find('.iti__selected-dial-code').text();
        $('input[name=phone_code]').val('+' + phoneInput.getSelectedCountryData().dialCode);
    });

    const DocphoneInputField = document.querySelector(".doc_phone");
    const docphoneInput = window.intlTelInput(DocphoneInputField, {
        preferredCountries: ["us", "co", "in", "de"],
        initialCountry: "in",
        separateDialCode: true,
        utilsScript: "{{url('assets/js/utils.js')}}",
    });
    DocphoneInputField.addEventListener("countrychange", function() {
        $('input[name=phone_code]').val('+' + docphoneInput.getSelectedCountryData().dialCode);
    });
</script>
@endsection
