<!-- <img class="w-full object-cover bg-cover msm:block xxsm:hidden" src="{{ asset('/images/upload/'.$setting->banner_image') }}" alt=""> -->

<!-- // $doctors = Doctor::with('category:id,name')->where([['status', 1], ['is_filled', 1], ['subscription_status', 1]])->get()->take(2);
        // dd($doctors); -->




<!-- <div class="xsm:mx-5 xxsm:mx-5">
        @if(count($doctors)>0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xlg:grid-cols-4 lg:grid-cols-3">
            @foreach ($doctors as $doctor)
            <a href="{{ url('doctor-profile/'.$doctor['id'].'/'.Str::slug($doctor['name'])) }}">
                <div class="border border-white-light p-10 1xl:h-[350px] xxmd:h-[300px] xmd:h-[300px] msm:h-[300px]">
                    <img class="2xl:w-28 2xl:h-28 xlg:h-24 xlg:w-24 xl:h-24 xl:w-24 lg:h-24 lg:w-24 xxmd:w-24 xxmd:h-24 md:h-20 md:w-20 sm:h-20 sm:w-20 xsm:h-16 xsm:w-16 msm:h-24
                msm:w-24 xxsm:h-14 xxsm:w-14 1xl:mt-8 msm:mt-2 xsm:mt-0 xxsm:mt-0 border border-primary rounded-full p-0.5 m-auto mt-12 object-cover bg-cover" src="{{ url($doctor->fullImage) }}" alt="" />
                    <h5 class="font-fira-sans font-normal text-lg leading-6 text-black text-center md:text-md pt-5">
                        {{ $doctor->name }}
                    </h5>
                    <p class="font-normal leading-4 text-sm text-primary text-center font-fira-sans md:text-md py-2">
                        {{$doctor['expertise']['name'] }}
                    </p>
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
    </div> -->
