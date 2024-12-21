@extends('front.layouts.main')

@section('content')

{{--    <div class="container lg:px-10 xl:px-3">--}}
{{--        <div--}}
{{--            class="relative z-10 before:h-full before:w-full before:block before:bg-gradient-to-r before:from-primary-hover before:to-primary before:absolute before:-top-5 before:-z-10 before:rounded-xl lg:before:rounded-3xl before:-rotate-2 before:scale-105">--}}
{{--            <div--}}
{{--                class="relative z-10 py-12 overflow-hidden text-white bg-center bg-no-repeat bg-cover lg:py-24 xl:py-32 before:-z-10 rounded-b-xl lg:rounded-b-3xl before:absolute before:inset-0 before:bg-secondary/50"--}}
{{--                style="background-image: url('{{ asset('assets/images/slide-01.webp') }}');">--}}
{{--                <h1 class="z-10 text-xl font-bold text-center lg:text-3xl">--}}
{{--                    فرصت‌های شغلی--}}

{{--                </h1>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div--}}
{{--        class="p-5 mx-3 mt-5 space-y-2 font-medium lg:mt-10 lg:mx-auto lg:container lg:p-10 lg:space-y-5 lg:text-lg rounded-xl lg:rounded-3xl shadow-project">--}}


{{--        <h3 class="text-lg font-semibold text-center lg:text-xl xl:text-2xl">اطلاعات خود را وارد کرده و سپس دکمه ارسال--}}
{{--            رزومه--}}
{{--            را انتخاب کنید</h3>--}}

{{--        <form method="post" action="{{ route('front.resume.store') }}" class="mx-auto lg:pt-10 lg:w-2/3"--}}
{{--              enctype="multipart/form-data">--}}
{{--            @csrf--}}
{{--            @method('post')--}}
{{--            <div class="flex flex-col gap-3 lg:gap-5 lg:flex-row">--}}
{{--                <div class="flex-1">--}}
{{--                    <label for="name" class="font-medium lg:text-lg">نام و نام خانوادگی</label>--}}
{{--                    <div class="pr-1.5 border rounded-lg border-slate-300 flex items-center">--}}
{{--                  <span class="flex items-center justify-center w-10 h-10 rounded-lg bg-light shrink-0">--}}
{{--                    <svg class="w-5 h-5 ">--}}
{{--  <use xlink:href="{{ asset('assets/images/icons.svg#user') }}"></use>--}}
{{--</svg>--}}
{{--                  </span>--}}
{{--                        <input type="text" name="name" class="px-2 py-3 bg-transparent outline-none text-secondary grow"--}}
{{--                               value="{{ old('name') }}" id="name"/>--}}
{{--                    </div>--}}
{{--                    @error('name')--}}
{{--                    <span class="text-sm text-red-500">{{ $message }}</span>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--                <div class="flex-1">--}}
{{--                    <label for="mobile" class="font-medium lg:text-lg">شماره موبایل</label>--}}
{{--                    <div class="pr-1.5 border rounded-lg border-slate-300 flex items-center">--}}
{{--                  <span class="flex items-center justify-center w-10 h-10 rounded-lg bg-light shrink-0">--}}
{{--                    <svg class="w-5 h-5 ">--}}
{{--  <use xlink:href="{{ asset('assets/images/icons.svg#phone') }}"></use>--}}
{{--</svg>--}}
{{--                  </span>--}}
{{--                        <input type="text" name="mobile" value="{{ old('mobile') }}"--}}
{{--                               class="px-2 py-3 bg-transparent outline-none text-secondary grow" id="mobile"/>--}}
{{--                    </div>--}}
{{--                    @error('mobile')--}}
{{--                    <span class="text-sm text-red-500">{{ $message }}</span>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--            </div>--}}


{{--            <div class="mt-3">--}}
{{--                <label for="email" class="font-medium lg:text-lg">آدرس ایمیل</label>--}}
{{--                <div class="pr-1.5 border rounded-lg border-slate-300 flex items-center">--}}
{{--                <span class="flex items-center justify-center w-10 h-10 rounded-lg bg-light shrink-0">--}}
{{--                  <svg class="w-5 h-5 ">--}}
{{--                      <use xlink:href="{{ asset('assets/images/icons.svg#email') }}"></use>--}}
{{--                    </svg>--}}
{{--                </span>--}}
{{--                    <input type="email" name="email" class="px-2 py-3 bg-transparent outline-none text-secondary grow"--}}
{{--                           value="{{ old('email') }}" id="email"/>--}}
{{--                </div>--}}
{{--                @error('email')--}}
{{--                <span class="text-sm text-red-500">{{ $message }}</span>--}}
{{--                @enderror--}}
{{--            </div>--}}

{{--            <div class="flex flex-col gap-3 mt-3 lg:mt-5 lg:gap-5 lg:flex-row">--}}
{{--                <div class="flex-1"><label for="portfolio" class="font-medium lg:text-lg">فایل رزومه در قالب pdf</label>--}}
{{--                   <label class="pr-1.5 border rounded-lg border-slate-300 flex items-center"> <span--}}
{{--                            class="flex items-center justify-center w-10 h-10 rounded-lg bg-light shrink-0"> <svg--}}
{{--                                class="w-5 h-5"> <use xlink:href="../assets/images/icons.svg#file"></use> </svg> </span>--}}
{{--                        <span--}}
{{--                            id="previewFile" class="px-2 py-3 text-secondary grow">انتخاب فایل</span>--}}
{{--                        <input name="file"--}}
{{--                            data-toggle="file" data-target="#previewFile" type="file"--}}
{{--                            class="hidden px-2 py-3 bg-transparent outline-none text-secondary grow" id="portfolio"/>--}}
{{--                    </label>--}}
{{--                    @error('file')--}}
{{--                    <span class="text-sm text-red-500">{{ $message }}</span>--}}
{{--                    @enderror--}}
{{--                </div>--}}

{{--                <div class="flex-1"><label for="photo" class="font-medium lg:text-lg">تصویر ارسال کننده</label> <label--}}
{{--                        class="pr-1.5 border rounded-lg border-slate-300 flex items-center"> <span--}}
{{--                            class="flex items-center justify-center w-10 h-10 rounded-lg bg-light shrink-0"> <svg--}}
{{--                                class="w-5 h-5"> <use xlink:href="../assets/images/icons.svg#file"></use> </svg> </span>--}}
{{--                        <span--}}
{{--                            id="photoPreview" class="px-2 py-3 text-secondary grow">انتخاب فایل</span>--}}
{{--                        <input name="pic"--}}
{{--                            data-toggle="file"--}}
{{--                            data-target="#photoPreview"--}}
{{--                            type="file"--}}
{{--                            class="hidden px-2 py-3 bg-transparent outline-none text-secondary grow"--}}
{{--                            id="photo"/>--}}
{{--                    </label>--}}
{{--                    @error('pic')--}}
{{--                    <span class="text-sm text-red-500">{{ $message }}</span>--}}
{{--                    @enderror--}}
{{--                </div>--}}

{{--            </div>--}}
{{--            <div class="flex justify-center mt-3 lg:mt-10">--}}
{{--                <button class="btn btn-primary">ارسال رزومه</button>--}}
{{--            </div>--}}

{{--        </form>--}}

{{--    </div>--}}
{{--    @if ($errors->any())--}}
{{--        <div data-toggle="alert" data-time="5000" class="alert alert-error">--}}
{{--            <div class="alert-wrapper grow">--}}
{{--                <svg class="">--}}
{{--                    <use xlink:href="../assets/images/icons.svg#file"></use>--}}
{{--                </svg>--}}
{{--                <span>--}}
{{--               لطفا خطا های ورودی را برطرف کنید--}}
{{--            </span></div>--}}
{{--            <span data-toggle="dismis" class="alert-dismis"> <svg class=""> <use--}}
{{--                        xlink:href="../assets/images/icons.svg#close"></use> </svg> </span></div>--}}
{{--    @endif--}}
{{--    @if(session()->has('success_add'))--}}
{{--        <div data-toggle="alert" data-time="5000" class="alert alert-success">--}}
{{--            <div class="alert-wrapper grow">--}}
{{--                <svg class="">--}}
{{--                    <use xlink:href="../assets/images/icons.svg#file"></use>--}}
{{--                </svg>--}}
{{--                <span>--}}
{{--                {{ session()->get('success_add') }}--}}
{{--            </span></div>--}}
{{--            <span data-toggle="dismis" class="alert-dismis"> <svg class=""> <use--}}
{{--                        xlink:href="../assets/images/icons.svg#close"></use> </svg> </span></div>--}}

{{--    @endif--}}
<header class=" relative mt-14 lg:mt-0">
    <div class="relative before:bg-primary/60 before:absolute before:inset-0 ">
        <img src="{{ asset('assets/images/banner/about.png') }}" alt="" class="aspect-[13/5]">
    </div>

    <div class="absolute flex  pb-1 pt-5 lg:py-3 flex-col justify-end items-center inset-0 text-white text-center">
        <h1 class=" lg:text-3xl font-semibold">فرصت های شغلی</h1>
        <div class="w-1 h-6 my-1 lg:my-4 bg-secondary"></div>
        <h2 class="mx-3 lg:w-1/3 text-lg text-sm lg:text-2xl border-2 border-white py-3 px-4"></h2>
        <div class="w-1 h-10 lg:h-32 mt-1 lg:mt-4 bg-secondary"></div>
    </div>

</header>


{{--<section class="container space-y-3 lg:space-y-6 py-3 lg:py-16">--}}
{{--    <div class="border-r-4 border-primary h-7 hidden lg:block"></div>--}}
{{--    <div>--}}
{{--        <h3 class="font-semibold text-2xl lg:text-4xl text-primary border-r-4 lg:border-r-0 border-primary lg:pr-0 pr-3">فرصت های شغلی</h3>--}}
{{--        <h4 class="text-gray-500"></h4>--}}
{{--    </div>--}}
{{--    <p class="lg:text-lg text-justify leading-7">--}}
{{--        اطلاعات خود را وارد کرده و سپس دکمه ارسال رزومه را انتخاب کنید--}}
{{--    </p>--}}


{{--    <div class=" mx-3 mt-5 space-y-2 font-medium lg:mt-10 lg:mx-auto lg:container lg:p-10 lg:space-y-5 lg:text-lg rounded-xl lg:rounded-3xl shadow-project">--}}


{{--        <h3 class="text-lg font-semibold text-center lg:text-xl xl:text-2xl">اطلاعات خود را وارد کرده و سپس دکمه ارسال--}}
{{--            رزومه--}}
{{--            را انتخاب کنید</h3>--}}






{{--        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 container ">--}}
{{--            <div class="">--}}
{{--                <img class="object-cover aspect-square" src="{{ asset('assets/images/banner/contact.png') }}" alt="">--}}
{{--            </div>--}}
{{--            <form  action="{{ route('front.resume.store') }}" method="post" name="resumeForm" enctype="multipart/form-data" class="space-y-6">--}}
{{--                @csrf--}}
{{--                <div class="flex flex-col">--}}
{{--                    <label for="name">نام و نام خانوادگی:</label>--}}
{{--                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="border-2 border-gray-300 py-1.5 px-2 outline-none w-full">--}}
{{--                    @error('name')--}}
{{--                    <span class="text-sm text-red-500">{{ $message }}</span>--}}
{{--                    @enderror--}}
{{--                </div>--}}

{{--                <div class="flex flex-col">--}}
{{--                    <label for="mobile">تلفن همراه:</label>--}}
{{--                    <input type="tel" id="mobile" name="mobile" value="{{ old('mobile') }}" class="border-2 border-gray-300 py-1.5 px-2 outline-none w-full">--}}
{{--                    @error('mobile')--}}
{{--                    <span class="text-sm text-red-500">{{ $message }}</span>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--                <div class="flex flex-col">--}}
{{--                    <label for="email"> آدرس ایمیل:</label>--}}
{{--                    <input type="text" id="email" name="email" value="{{ old('email') }}" class="border-2 border-gray-300 py-1.5 px-2 outline-none w-full">--}}
{{--                    @error('email')--}}
{{--                    <span class="text-sm text-red-500">{{ $message }}</span>--}}
{{--                    @enderror--}}
{{--                </div>--}}

{{--                <div class="flex-1">--}}
{{--                    <label for="file" class="font-medium lg:text-lg">فایل رزومه در قالب pdf:</label> <label class="border-2 border-gray-300 py-1.5 px-2 outline-none flex items-center">--}}
{{--                        <span id="filePreview" class="px-2  text-secondary grow" data-default="انتخاب فایل">انتخاب فایل</span>--}}
{{--                        <input name="file" required="" data-toggle="file" data-target="#photoPreview" type="file" class="hidden px-2 py-3 bg-transparent outline-none text-secondary grow" id="file">--}}

{{--                    </label>--}}
{{--                    @error('file')--}}
{{--                    <span class="text-sm text-red-500">{{ $message }}</span>--}}
{{--                    @enderror--}}
{{--                </div>--}}

{{--                <div class="flex-1">--}}
{{--                    <label for="photo" class="font-medium lg:text-lg">تصویر ارسال کننده:</label> <label class="border-2 border-gray-300 py-1.5 px-2 outline-none flex items-center">--}}
{{--                        <span id="photoPreview" class="px-2  text-secondary grow" data-default="انتخاب فایل">انتخاب فایل</span>--}}
{{--                        <input name="pic" data-toggle="file" data-target="#photoPreview" type="file" class="hidden px-2 py-3 bg-transparent outline-none text-secondary grow" id="photo">--}}

{{--                    </label>--}}
{{--                    @error('pic')--}}
{{--                    <span class="text-sm text-red-500">{{ $message }}</span>--}}
{{--                    @enderror--}}
{{--                </div>--}}

{{--                <button type="submit" class="text-white  bg-primary transition-all duration-300 py-4 px-6 hover:bg-primary-second text-center relative before:bg-white before:w-0.5 before:h-3 before:absolute before:top-0 before:right-1/2 before:translate-x-1/2 w-full">--}}
{{--                    ارسال رزومه--}}
{{--                </button>--}}
{{--            </form>--}}
{{--            @if ($errors->any())--}}
{{--                <div data-toggle="alert" data-time="5000" class="alert alert-error">--}}
{{--                    <div class="alert-wrapper grow">--}}
{{--                        <svg class="">--}}
{{--                            <use xlink:href="../assets/images/icons.svg#file"></use>--}}
{{--                        </svg>--}}
{{--                        <span>--}}
{{--                           لطفا خطا های ورودی را برطرف کنید--}}
{{--                        </span></div>--}}
{{--                    <span data-toggle="dismis" class="alert-dismis"> <svg class=""> <use--}}
{{--                                xlink:href="../assets/images/icons.svg#close"></use> </svg> </span></div>--}}
{{--            @endif--}}
{{--            @if(session()->has('success_add'))--}}
{{--                <div data-toggle="alert" data-time="5000" class="alert alert-success">--}}
{{--                    <div class="alert-wrapper grow">--}}
{{--                        <svg class="">--}}
{{--                            <use xlink:href="../assets/images/icons.svg#file"></use>--}}
{{--                        </svg>--}}
{{--                        <span>--}}
{{--                            {{ session()->get('success_add') }}--}}
{{--                        </span></div>--}}
{{--                    <span data-toggle="dismis" class="alert-dismis"> <svg class=""> <use--}}
{{--                                xlink:href="../assets/images/icons.svg#close"></use> </svg> </span></div>--}}

{{--            @endif--}}
{{--        </div>--}}
{{--    </div>--}}


{{--</section>--}}


<section class="container space-y-3 lg:space-y-6 py-3 lg:py-16">
    <div class="border-r-4 border-primary h-7 hidden lg:block"></div>
    <div class="flex justify-between"> <div>
            <h3 class="font-semibold text-2xl lg:text-4xl text-primary border-r-4 lg:border-r-0 border-primary lg:pr-0 pr-3">فرصت های شغلی</h3>
            <h4 class="text-gray-500"></h4>
        </div>
    </div>
    <p class="lg:text-lg text-justify leading-7">
        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
    </p>


    <div class=" mx-3 mt-5 space-y-2 font-medium lg:mt-10 lg:mx-auto lg:container lg:p-10 lg:space-y-5 lg:text-lg rounded-xl lg:rounded-3xl shadow-project">


        <h3 class="text-lg font-semibold text-center lg:text-xl xl:text-2xl">اطلاعات خود را وارد کرده و سپس دکمه ارسال
            رزومه
            را انتخاب کنید</h3>






        <div class="flex  justify-center container ">

            <form  action="{{ route('front.resume.store') }}" method="post" name="resumeForm" enctype="multipart/form-data" class="space-y-6 w-full lg:w-1/2">
                @csrf
                <div class="flex flex-col">
                    <label for="name">نام و نام خانوادگی:</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="border-2 border-gray-300 py-1.5 px-2 outline-none w-full">
                    @error('name')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="mobile">تلفن همراه:</label>
                    <input type="tel" id="mobile" name="mobile" value="{{ old('mobile') }}" class="border-2 border-gray-300 py-1.5 px-2 outline-none w-full">
                    @error('mobile')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <label for="email"> آدرس ایمیل:</label>
                    <input type="text" id="email" name="email" value="{{ old('email') }}" class="border-2 border-gray-300 py-1.5 px-2 outline-none w-full">
                    @error('email')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex-1">
                    <label for="file" class="font-medium lg:text-lg">فایل رزومه در قالب pdf:</label> <label class="border-2 border-gray-300 py-1.5 px-2 outline-none flex items-center">
                        <span id="filePreview" class="px-2  text-secondary grow" data-default="انتخاب فایل">انتخاب فایل</span>
                        <input name="file" required="" data-toggle="file" data-target="#photoPreview" type="file" class="hidden px-2 py-3 bg-transparent outline-none text-secondary grow" id="file">

                    </label>
                    @error('file')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex-1">
                    <label for="photo" class="font-medium lg:text-lg">تصویر ارسال کننده:</label> <label class="border-2 border-gray-300 py-1.5 px-2 outline-none flex items-center">
                        <span id="photoPreview" class="px-2  text-secondary grow" data-default="انتخاب فایل">انتخاب فایل</span>
                        <input name="pic" data-toggle="file" data-target="#photoPreview" type="file" class="hidden px-2 py-3 bg-transparent outline-none text-secondary grow" id="photo">

                    </label>
                    @error('pic')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="text-white  bg-primary transition-all duration-300 py-4 px-6 hover:bg-primary-second text-center relative before:bg-white before:w-0.5 before:h-3 before:absolute before:top-0 before:right-1/2 before:translate-x-1/2 w-full">
                    ارسال رزومه
                </button>
            </form>
            @if ($errors->any())
                <div data-toggle="alert" data-time="5000" class="alert alert-error">
                    <div class="alert-wrapper grow">
                        <svg class="">
                            <use xlink:href="../assets/images/icons.svg#file"></use>
                        </svg>
                        <span>
                           لطفا خطا های ورودی را برطرف کنید
                        </span></div>
                    <span data-toggle="dismis" class="alert-dismis"> <svg class=""> <use
                                xlink:href="../assets/images/icons.svg#close"></use> </svg> </span></div>
            @endif
            @if(session()->has('success_add'))
                <div data-toggle="alert" data-time="5000" class="alert alert-success">
                    <div class="alert-wrapper grow">
                        <svg class="">
                            <use xlink:href="../assets/images/icons.svg#file"></use>
                        </svg>
                        <span>
                            {{ session()->get('success_add') }}
                        </span></div>
                    <span data-toggle="dismis" class="alert-dismis"> <svg class=""> <use
                                xlink:href="../assets/images/icons.svg#close"></use> </svg> </span></div>

            @endif
        </div>
    </div>


</section>

@endsection

