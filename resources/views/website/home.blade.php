@extends('layout.mainlayout',['activePage' => 'home'])

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
<style>
    body[dir='rtl'] .btn-appointment {
        margin-right: 10px;
    }

    .bg-purple {
        background-color: #8b4e96;
    }

    .slick-slider .element {
        color: #fff;
        border-radius: 5px;
        display: inline-block;
        margin: 0px 10px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        font-size: 20px;
    }

    .slick-disabled {
        pointer-events: none;
        border-color: var(--site_color_hover);
    }

    .slick-disabled svg {
        fill: var(--site_color_hover);
    }

    .slick-dots {
        display: flex;
        justify-content: center;
        margin: 0;
        padding: 1rem 0;
        list-style-type: none;
    }

    .slick-dots li {
        margin: 0 0.25rem;
    }

    .slick-dots button {
        display: block;
        width: 10px;
        height: 10px;
        padding: 0;
        border: none;
        border-radius: 100%;
        background-color: #D9D9D9;
        text-indent: -9999px;
    }

    .slick-dots li.slick-active button {
        background-color: var(--site_color);
    }

    .site-hero .btn-appointment {
        bottom: 55%;
        left: 7%;
    }
</style>
@endsection

@section('content')
{{-- Skip Travelling --}}
<div class="w-full bg-cover bg-no-repeat" style="height:800px;background-image: url({{asset('/svg/patient/p_banner1.svg')}})">
    <div class="xlg:mx-20 xxsm:mx-4 xsm:mx-5 pt-20">
        <h1 class="font-fira-sans text-black font-normal text-6xl !1xl:w-2/4 2xl:w-1/3 md:w-3/4 xxsm:w-full leading-snug mb-10">Skip Travelling Online <span class="text-primary">Consultation</span> is the Future</h1>
        <a class="btn btn-link text-center mt-0 rounded-none px-6 py-3 md:px-3 md:py-3 bg-primary text-white font-normal font-fira-sans text-sm" target="_blank" href="{{url('/show-doctors')}}" role="button">{{__('Make Appointment') }}</a>
    </div>
</div>



<div class="xxsm:mx-5 xl:mx-0 2xl:mx-0">


    <div class="xl:w-3/4 mx-auto relative 2xl:-mt-[180px] 1xl:-mt-[160px] !xl:-mt-[205px] xlg:-mt-[110px] lg:-mt-[130px] md:-mt-[75px] xxmd:-mt-[95px] xmd:-mt-[85px] sm:-mt-[65px] xsm:mt-10 xxsm:mt-10 mb-20">
        <div class="grid xxsm:grid-cols-1 xsm:grid-cols-1 msm:grid-cols-1 sm:grid-cols-3 lg:grid-cols-3 2xl:h-96 1xl:h-full xlg:h-full lg:h-72 xxmd:h-[250px] xxmd:w-full md:h-full md:w-full sm:h-full sm:w-full msm:h-full msm:w-full !xsm:w-full !xsm:h-full xxsm:w-full xxsm:h-full ">
            @foreach ($banners as $banner)
            <div class="mx-auto pt-20 pb-20 h-full w-full 1xl:h-96 1xl:w-full xl:h-full xxsm:h-96 xxsm:w-80 xsm:h-80 xsm:w-80 msm:h-80 msm:w-full sm:h-full sm:w-full md:h-full md:w-full align-items-center {{ $loop->iteration % 2 == 0 ? 'bg-primary text-white' : 'bg-white-50 text-black' }} shadow-2xl my-auto">
                <img class="lg:h-16 lg:w-16 xxmd:h-12 xxmd:w-12 md:h-10 md:w-10 sm:h-10 sm:w-10 xsm:h-14 xsm:w-14 xxsm:h-10 xxsm:w-10 mx-auto
            bg-cover object-cover mb-5" src="{{asset($banner->fullImage)}}" alt="" />
                <h4 class="{{ $loop->iteration % 2 == 0 ? 'text-white' : 'text-black' }} text-center md:text-xl font-medium 1xl:mt-2 lg:mt-1 md:mt-2 xsm:mt-2 leading-8 font-fira-sans sm:text-xs xsm:text-lg xxsm:text-xs mb-5">
                    {{$banner->name}}
                </h4>
                <p class="font-fira-sans font-normal text-sm text-center mx-5">Lorem ipsum dolor sit amet, elit. Euismod habitasse pulvinar faucibus eget.Lorem ipsum dolor sit amet, elit. Euismod habitasse pulvinar faucibus eget</p>
            </div>
            @endforeach
        </div>
    </div>



    {{-- our doctor--}}
    <div class="mt-20 xl:w-3/4 mx-auto mb-20">
        <div class="justify-between flex sm:flex-row xxsm:flex-col 2xl:mt-28 mb-8 xxsm:mt-10 lg:mt-40">
            <div class="sm:py-3 md:py-0 msm:py-3 xsm:py-3 xxsm:py-3">
                <h2 class="font-medium 2xl:text-4xl xl:text-4xl xlg:text-4xl lg:text-4xl xmd:text-4xl md:text-4xl msm:text-4xl sm:text-4xl xsm:text-4xl xxsm:text-2xl leading-10 font-fira-sans text-black">
                    {{__('Our Doctors')}}
                </h2>
            </div>
            @if(count($doctors)>0)
            <div class="sm:py-3 md:py-0 msm:py-3 xsm:py-3 xxsm:py-3">
                <a href="{{ url('show-doctors') }}" class="text-sm font-normal font-fira-sans leading-4 text-primary border border-primary text-center md:text-sm py-3.5 px-7">{{__('View All Doctors')}}</a>
            </div>
            @else
            @endif
        </div>
        @if(count($doctors)>0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xlg:grid-cols-4 lg:grid-cols-3">
            @foreach ($doctors as $doctor)
            <a href="{{ url('doctor-profile/'.$doctor['id'].'/'.Str::slug($doctor['name'])) }}">
                <div class="border border-white-light p-10">
                    <div class="border-2 border-primary rounded-full w-36 h-36 mx-auto overflow-hidden">
                        <img class="w-36 h-36 object-cover rounded-full" src="{{ url($doctor->fullImage) }}" alt="" />
                    </div>

                    <h5 class="font-fira-sans font-normal text-lg leading-6 text-black text-center md:text-md pt-5">
                        {{ $doctor->name }}
                    </h5>
                    {{--<p class="font-normal leading-4 text-sm text-primary text-center font-fira-sans md:text-md py-2">
                        {{$doctor['expertise']['name'] }}
                    </p> --}}
                    <p class="font-normal leading-4 text-sm text-gray text-center md:text-md"><i class="fa-solid fa-star text-yellow"></i> {{ $doctor['rate'] }} ({{$doctor['review'] }} {{
                 __('reviews') }})</p>
                </div>
            </a>
            @endforeach
        </div>
        @else
        <div class="flex justify-center mt-44 font-fira-sans font-normal text-base text-gray">
            {{__('No Data Avalaible')}}
        </div>
        @endif

    </div>


    {{-- Browse by Specialities--}}
    <div class="p-5 w-full mb-10" style="background-color: aliceblue;">
        <div class="xl:w-3/4 mx-auto pt-20 pb-20">
            <div class="grid xlg:grid-cols-4 lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-2 msm:grid-cols-1 xsm:grid-cols-1 xxsm:grid-cols-1">
                <div class="sm:col-span-2 msm:col-span-1 xsm:col-span-1 xxsm:col-span-1 ">
                    @if(isset($setting->home_content) || isset($setting->home_content_desc))
                    <div class="justify-center items-left md:mt-12 lg:mt-16 sm:mt-11 msm:mt-11 xsm:mt-11 xxsm:mt-11">
                        <h2 class="font-medium 2xl:text-4xl xl:text-4xl xlg:text-4xl lg:text-4xl xmd:text-4xl md:text-4xl msm:text-4xl sm:text-4xl xsm:text-4xl xxsm:text-2xl leading-10 font-fira-sans text-black ">
                            {{ $setting->home_content}}
                        </h2>
                        <p class="font-normal leading-5 text-sm text-gray text-left lg:mt-4 xmd:mt-4 md:mt-4 sm:pt-3 msm:pt-3 xsm:pt-3 xxsm:pt-3 ">
                            {!! $setting->home_content_desc !!}</p>
                    </div>
                    @else
                    <div class="flex justify-center mt-44 font-fira-sans font-normal text-base text-gray">
                        {{__('No Data Avalaible')}}
                    </div>
                    @endif
                </div>
                @if(count($treatments) > 0)
                @foreach($treatments as $treatment)
                <div class="bg-white shadow-xl p-14 transform w-full h-full hover:bg-white-50 transition duration-500 hover:scale-110 xxsm:mt-10 2xl:mt-0">
                    <div class="justify-center items-center w-full">
                        <img class="lg:h-16 lg:w-16 xxmd:w-16 xxmd:h-16 md:h-10 md:w-10 sm:h-10 sm:w-10 msm:h-10 msm:w-10 xsm:h-10 xsm:w-10 xxsm:h-10 xxsm:w-10 mx-auto  bg-cover object-cover" src="{{$treatment->fullImage}}" alt="" />
                        <p class="font-fira-sans font-normal text-xl xxsm:text-base leading-6 text-black text-center md:text-xl py-5">
                            {{$treatment->name}}
                        </p>
                        <p class="font-fira-sans text-center md:text-xl">
                        <form action="{{ url('show-doctors') }}" method="post" class="text-center">
                            @csrf
                            <input type="hidden" name="treatment_id" value="{{ $treatment->id }}">
                            <button type="submit" class="font-medium leading-4 text-sm text-primary text-center font-fira-sans md:text-sm">{{__('Consult Now!')}}
                                <svg width="11" height="11" viewBox="0 0 11 11" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.73544 0.852912C8.6542 0.446742 8.25908 0.183329 7.85291 0.264563L1.23399 1.58835C0.827824 1.66958 0.564411 2.0647 0.645646 2.47087C0.72688 2.87704 1.122 3.14045 1.52817 3.05922L7.41165 1.88252L8.58835 7.76601C8.66958 8.17218 9.0647 8.43559 9.47087 8.35435C9.87704 8.27312 10.1405 7.878 10.0592 7.47183L8.73544 0.852912ZM2.62404 10.416L8.62404 1.41602L7.37596 0.583973L1.37596 9.58397L2.62404 10.416Z" />
                                </svg>
                            </button>
                        </form>
                        </p>
                    </div>
                </div>
                @endforeach
                @else
                <div class="flex justify-center mt-44 font-fira-sans font-normal text-base text-gray">
                    {{__('No Data Avalaible')}}
                </div>
                @endif
            </div>
        </div>
    </div>






    {{-- Read top articles from health experts --}}
    <div class="py-10 xl:w-3/4 mx-auto 2xl:mb-20">
        <div class="flex justify-between md:flex-row sm:flex-row xxsm:flex-col">
            <div class="sm:py-3 md:py-0 msm:py-3 xsm:py-3 xxsm:py-3">
                <h2 class="font-medium 2xl:text-4xl xl:text-4xl xlg:text-4xl lg:text-4xl xmd:text-4xl md:text-3xl msm:text-2xl sm:text-2xl xsm:text-2xl xxsm:text-2xl leading-10 font-fira-sans text-black">
                    {{__('Read top articles from health experts')}}
                </h2>
            </div>

            <div class="flex">
                <button type="button" class="prev w-10 md:px-2 lg:text-base lg:py-2 md:text-sm md:py-2 sm:py-2 sm:px-3 msm:py-2 msm:px-3 xsm:py-2 xsm:px-3 xxsm:py-2 xxsm:px-3 text-primary border border-primary text-center">
                    <svg class="m-auto" width="8" height="12" viewBox="0 0 8 12" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.29303 11.707L0.586032 5.99997L6.29303 0.292969L7.70703 1.70697L3.41403 5.99997L7.70703 10.293L6.29303 11.707Z" />
                    </svg>
                </button>
                <button type="button" class="ml-2 next w-10 md:px-2 lg:text-base lg:py-2 md:text-sm md:py-2 sm:py-2 sm:px-3 msm:py-2 msm:px-3 xsm:py-2 xsm:px-3 xxsm:py-2 xxsm:px-3 text-primary border border-primary text-center">
                    <svg class="m-auto" width="8" height="12" viewBox="0 0 8 12" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.70697 11.707L7.41397 5.99997L1.70697 0.292969L0.292969 1.70697L4.58597 5.99997L0.292969 10.293L1.70697 11.707Z" />
                    </svg>
                </button>
            </div>

        </div>

        <div class="single-item mb-5">
            @if(count($blogs) > 0)
            <div class="slick-slider-ltr" dir="ltr">
                @foreach ($blogs as $blog)
                <a href="{{  url('blog-details/'.$blog->id.'/'.Str::slug($blog->title)) }}">
                    <div class="element element-{{ $loop->iteration }} ">
                        <div class="md:mt-12 sm:mt-11 msm:mt-11 xsm:mt-11 xxsm:mt-11 w-full">
                            <img class="w-full h-56 object-cover bg-cover" src="{{ url('images/upload/'.$blog->image) }}" alt="" />
                            <div class="w-96 text-gray text-left font-medium text-base py-2 font-fira-sans flex">
                                @if (strlen($blog->title) > 30)
                                <div class="font-fira-sans text-primary text-base font-normal md:text-sm">{!!
                                    substr(clean($blog->title),0,30) !!}....</div>
                                @else
                                <div class="font-fira-sans text-primary text-base font-normal md:text-sm">{!!
                                    clean($blog->title) !!}</div>
                                @endif
                                <div class="ml-5">
                                    {{ Carbon\Carbon::parse($blog->created_at)->format('d M,Y') }}
                                </div>
                            </div>
                            <p class="font-fira-sans font-normal text-xl text-black text-left mb-2">{{ $blog->blog_ref }}</p>
                            <div class="font-fira-sans font-normal text-sm text-gray w-[400px] h-[40px] truncate">{{ strip_tags(html_entity_decode($blog->desc)) }}</div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            @endif
            @if(count($blogs) < 0) <div class="flex justify-center mt-44 font-fira-sans font-normal text-base text-gray">
                {{__('No Data Avalaible')}}
        </div>
        @endif

    </div>



</div>

{{-- Download the Doctro --}}
<div class="p-5 w-full mb-10" style="background-color:aliceblue;padding:5rem;">
    <div class="rounded-xl">
        <div class="grid xxsm:grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 3xl:grid-cols-2 self-center relative">
            <div class="mt-20 xl:w-96 xxsm:w-full mx-auto">
                <div class="mb-10">
                    <h1 class="font-medium leading-10 font-fira-sans text-primary 2xl:text-4xl xl:text-4xl xlg:text-4xl lg:text-4xl xmd:text-4xl md:text-4xl msm:text-4xl sm:text-4xl xsm:text-2xl xxsm:text-2xl">
                        {{__('Download the ')}} {{ $setting->business_name }} {{__('app')}}
                    </h1>
                    <p class="lg:pt-7 md:pt-2 msm:pt-2 xsm:pt-2 xxsm:pt-2 leading-6 md:leading-1 md:text-xs font-fira-sans font-normal text-sm text-gray text-left">
                        {{__('Get in touch with the top-most expert Specialist Doctors for an accurate consultation on
                        the
                        Doctro. Connect with Doctors, that will be available 24/7 right for you.')}}
                    </p>
                </div>
                <div class="flex xxsm:flex-col msm:flex-row gap-6 ">
                    <a href="javascript:void(0)" class="store_btn">
                        <img src="{{ asset('assets/image/google pay.png')}}" style="width: 200px;height:62px">
                    </a>
                    <a href="javascript:void(0)" class="store_btn ">
                        <img src="{{ asset('assets/image/app store.png')}}" style="width: 200px;height:62px">
                    </a>
                </div>
            </div>
            <div class="mx-auto pt-24">
                <img src="{{asset('/svg/footerbanner.svg')}}" class="bg-cover object-cover 2xl:w-[80%] 1xl:w-[70%] xl:w-[100%] lg:w-[100%] xmd:w-80 md:w-80 sm:w-full msm:w-full xsm:w-80 xxsm:w-full xlg:w-96" alt="">
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('js')
<script src="{{ url('assets/js/slick.min.js') }}"></script>
<script>
    $('.slick-slider-rtl').slick({
        infinite: false,
        prevArrow: $('.prev'),
        nextArrow: $('.next'),
        autoplay: true,
        autoplaySpeed: 1000,
        slidesToShow: 3,
        lidesToScroll: 1,
        dots: true,
        rtl: true,
        slidesToShow: 3, // Shows a three slides at a time
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.slick-slider-ltr').slick({
        infinite: false,
        prevArrow: $('.prev'),
        nextArrow: $('.next'),
        autoplay: true,
        autoplaySpeed: 1000,
        slidesToShow: 3,
        lidesToScroll: 1,
        dots: true,
        ltr: true,
        slidesToShow: 3, // Shows a three slides at a time
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
</script>
@endsection
