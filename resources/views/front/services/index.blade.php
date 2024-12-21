@extends('front.layouts.main')

@section('content')


    <x-front.partials.pages.header title="خدمات قابل ارائه" :description="$DefaultTextSettings->services_text" :pic="$GeneralSettings->service_page_image"/>


    <section class="container space-y-3 lg:space-y-6 py-3 lg:py-16">
        <div class="border-r-4 border-primary h-7 hidden lg:block"></div>
        <div>
            <h3 class="font-semibold text-2xl lg:text-4xl text-primary border-r-4 lg:border-r-0 border-primary lg:pr-0 pr-3">
                بخشی از خدمات ما</h3>
            <h4 class="text-gray-500"></h4>
        </div>
{{--        <p class="lg:text-lg text-justify leading-7">--}}
{{--            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون--}}
{{--            بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با--}}
{{--            هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و--}}
{{--            متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ--}}
{{--            پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط--}}
{{--            سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود--}}
{{--            طراحی اساسا مورد استفاده قرار گیرد.--}}
{{--        </p>--}}


        <div class="grid grid-cols-2 lg:grid-cols-4">
{{--            <a href="{{ route('front.single.services','ارائه-راهکارهای-دیجیتال') }}"--}}
{{--               class="border transition-background group duration-300 hover:text-white hover:bg-primary text-center text-lg border-gray-300 flex flex-col items-center pt-6 lg:pt-20 pb-4 lg:pb-14 px-5">--}}
{{--                <svg class="lg:w-44 w-24 h-24 lg:h-44 text-primary group-hover:text-current">--}}
{{--                    <use xlink:href="assets/images/icons.svg#idea"></use>--}}
{{--                </svg>--}}
{{--                <div class="mt-6 lg:mt-10 space-y-4 lg:space-y-6">--}}
{{--                    <h3 class="text-xl lg:text-4xl font-semibold ">ارائه راهکار های دیجیتال</h3>--}}
{{--                    <div class=" invisible opacity-0 group-hover:visible group-hover:opacity-100">بیشتر ...</div>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--            <a href="{{ route('front.single.services','تولید-محتوا') }}"--}}
{{--               class="border transition-background group duration-300 hover:text-white hover:bg-primary text-center text-lg border-gray-300 flex flex-col items-center pt-6 lg:pt-20 pb-4 lg:pb-14 px-5">--}}
{{--                <svg class="lg:w-44 w-24 h-24 lg:h-44 text-primary group-hover:text-current">--}}
{{--                    <use xlink:href="assets/images/icons.svg#content"></use>--}}
{{--                </svg>--}}
{{--                <div class="mt-6 lg:mt-10 space-y-4 lg:space-y-6">--}}
{{--                    <h3 class="text-xl lg:text-4xl font-semibold ">تولید محتوا</h3>--}}
{{--                    <div class=" invisible opacity-0 group-hover:visible group-hover:opacity-100">بیشتر ...</div>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--            <a href="{{ route('front.single.services','طراحی-سایت-و-اپلیکیشن') }}"--}}
{{--               class="border transition-background group duration-300 hover:text-white hover:bg-primary text-center text-lg border-gray-300 flex flex-col items-center pt-6 lg:pt-20 pb-4 lg:pb-14 px-5">--}}
{{--                <svg class="lg:w-44 w-24 h-24 lg:h-44 text-primary group-hover:text-current">--}}
{{--                    <use xlink:href="assets/images/icons.svg#web"></use>--}}
{{--                </svg>--}}
{{--                <div class="mt-6 lg:mt-10 space-y-4 lg:space-y-6">--}}
{{--                    <h3 class="text-xl lg:text-4xl font-semibold ">طراحی سایت و اپلیکیشن</h3>--}}
{{--                    <div class=" invisible opacity-0 group-hover:visible group-hover:opacity-100">بیشتر ...</div>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--            <a href="{{ route('front.single.services','لایو-استریم') }}"--}}
{{--               class="border transition-background group duration-300 hover:text-white hover:bg-primary text-center text-lg border-gray-300 flex flex-col items-center pt-6 lg:pt-20 pb-4 lg:pb-14 px-5">--}}
{{--                <svg class="lg:w-44 w-24 h-24 lg:h-44 text-primary group-hover:text-current">--}}
{{--                    <use xlink:href="assets/images/icons.svg#webinar"></use>--}}
{{--                </svg>--}}
{{--                <div class="mt-6 lg:mt-10 space-y-4 lg:space-y-6">--}}
{{--                    <h3 class="text-xl lg:text-4xl font-semibold ">لایواستریم</h3>--}}
{{--                    <div class=" invisible opacity-0 group-hover:visible group-hover:opacity-100">بیشتر ...</div>--}}
{{--                </div>--}}
{{--            </a>--}}
            @foreach($services as $service)
                <a href="{{ route('front.single.services',$service->slug) }}"
                   class="border-2 transition-background group duration-300 hover:border-primary text-center text-lg border-gray-300 flex flex-col items-center pt-6 lg:pt-20 pb-4 lg:pb-14 px-5">
                    <img src="{{ asset($service->image) }}" alt="" class="lg:w-44 w-24 h-24 lg:h-44 text-primary group-hover:text-current">
                    {{--                   <svg class="lg:w-44 w-24 h-24 lg:h-44 text-primary group-hover:text-current">--}}
                    {{--                        <use xlink:href="assets/images/icons.svg#idea"></use>--}}
                    {{--                    </svg>--}}
                    <div class="mt-6 lg:mt-10 space-y-4 lg:space-y-6">
                        <h3 class="text-xl lg:text-4xl font-semibold ">{{ $service->title }}</h3>
                        <div class=" invisible opacity-0 group-hover:visible group-hover:opacity-100">بیشتر ...</div>
                    </div>
                </a>

            @endforeach
        </div>


    </section>


@endsection
