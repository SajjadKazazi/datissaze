@extends('front.layouts.main')
@section('title', 'تماس با ما')

@section('content')

    {{--    <x-front.partials.pages.header title="با ما در تماس باشید ..."--}}
    {{--                                   description="سوال دارید؟ اطلاعات و توضیحات بیشتری نیاز دارید؟"/>--}}

    {{--    <section class="container space-y-3 lg:space-y-6 py-3 lg:py-16">--}}
    {{--        <div class="border-r-4 border-primary h-7 hidden lg:block"></div>--}}
    {{--        <div>--}}
    {{--            <h3 class="font-semibold text-2xl lg:text-4xl text-primary border-r-4 lg:border-r-0 border-primary lg:pr-0 pr-3">--}}
    {{--                تماس با ما</h3>--}}
    {{--            <h4 class="text-gray-500"></h4>--}}
    {{--        </div>--}}
    {{--        <div id="map" class="z-40" style="height: 500px"></div>--}}

    {{--        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">--}}
    {{--            <div class="bg-primary text-white py-5 px-4 space-y-6">--}}
    {{--                <div class="flex items-center gap-4">--}}
    {{--                    <svg class="w-8 h-8 shrink-0">--}}
    {{--                        <use xlink:href="assets/images/icons.svg#location"></use>--}}
    {{--                    </svg>--}}
    {{--                    <p>{{ $settings->address }}</p>--}}
    {{--                </div>--}}

    {{--                <div class="flex items-center gap-4">--}}
    {{--                    <svg class="w-8 h-8 shrink-0">--}}
    {{--                        <use xlink:href="assets/images/icons.svg#phone-circle"></use>--}}
    {{--                    </svg>--}}
    {{--                    <p><a href="tel:{{ $settings->tel }}">{{ fixPersianCharNum($settings->tel )}}</a></p>--}}
    {{--                </div>--}}


    {{--                <div class="flex items-center gap-4">--}}
    {{--                    <svg class="w-8 h-8 shrink-0">--}}
    {{--                        <use xlink:href="assets/images/icons.svg#location"></use>--}}
    {{--                    </svg>--}}
    {{--                    <p>{{ fixPersianCharNum($settings->postal_code  ) }}</p>--}}
    {{--                </div>--}}
    {{--                <div class="flex items-center gap-4">--}}
    {{--                    <svg class="w-8 h-8 shrink-0">--}}
    {{--                        <use xlink:href="assets/images/icons.svg#email"></use>--}}
    {{--                    </svg>--}}
    {{--                    <p>{{ $settings->email }}</p>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <form method="post" action="{{ route('front.contact.store') }}">--}}
    {{--                @csrf--}}
    {{--                @method('POST')--}}
    {{--                <div class="space-y-6">--}}
    {{--                    <div class="flex flex-col">--}}
    {{--                        <label for="name">نام:</label>--}}
    {{--                        <input type="text" id="name" name="name"--}}
    {{--                               class="border-2 border-gray-300 py-1.5 px-2 outline-none w-full"--}}
    {{--                               value="{{ old('name') }}">--}}
    {{--                    </div>--}}
    {{--                    @error('name')--}}
    {{--                    <span class="text-sm text-red-500" style="color: red">{{ $message }}</span>--}}
    {{--                    @enderror--}}

    {{--                    <div class="flex flex-col">--}}
    {{--                        <label for="subject">موضوع:</label>--}}
    {{--                        <input type="text" id="subject" name="subject"--}}
    {{--                               class="border-2 border-gray-300 py-1.5 px-2 outline-none w-full"--}}
    {{--                               value="{{ old('subject') }}">--}}
    {{--                    </div>--}}
    {{--                    @error('subject')--}}
    {{--                    <span class="text-sm text-red-500" style="color: red">{{ $message }}</span>--}}
    {{--                    @enderror--}}
    {{--                    <div class="flex flex-col">--}}
    {{--                        <label for="phone">تلفن همراه:</label>--}}
    {{--                        <input type="text" id="mobile" name="mobile"--}}
    {{--                               class="border-2 border-gray-300 py-1.5 px-2 outline-none w-full"--}}
    {{--                               value="{{ old('mobile') }}">--}}
    {{--                    </div>--}}
    {{--                    @error('mobile')--}}
    {{--                    <span class="text-sm text-red-500" style="color: red">{{ $message }}</span>--}}
    {{--                    @enderror--}}
    {{--                    <div class="flex flex-col">--}}
    {{--                        <label for="message">پیغام:</label>--}}
    {{--                        <textarea id="message" name="message"--}}
    {{--                                  class="border-2 border-gray-300 py-1.5 px-2 outline-none w-full min-h-44">{{ old('message') }}</textarea>--}}
    {{--                    </div>--}}
    {{--                    @error('message')--}}
    {{--                    <span class="text-sm text-red-500" style="color: red">{{ $message }}</span>--}}
    {{--                    @enderror--}}
    {{--                    <button type="submit"--}}
    {{--                            class="text-white relative bg-primary transition-all duration-300 py-4 px-6 hover:bg-primary-second text-center relative before:bg-white before:w-0.5 before:h-3 before:absolute before:top-0 before:right-1/2 before:translate-x-1/2 w-full">--}}
    {{--                        پیامتان را برای ما ارسال کنید--}}
    {{--                    </button>--}}
    {{--                </div>--}}

    {{--            </form>--}}

    {{--        </div>--}}

    {{--        @if ($errors->any())--}}
    {{--            <div data-toggle="alert" data-time="5000" class="alert alert-error">--}}
    {{--                <div class="alert-wrapper grow">--}}
    {{--                    <svg class="">--}}
    {{--                        <use xlink:href="../assets/images/icons.svg#file"></use>--}}
    {{--                    </svg>--}}
    {{--                    <span>--}}
    {{--              لطفا خطا های ورودی را برطرف کنید--}}
    {{--           </span></div>--}}
    {{--                <span data-toggle="dismis" class="alert-dismis"> <svg class=""> <use--}}
    {{--                            xlink:href="../assets/images/icons.svg#close"></use> </svg> </span></div>--}}
    {{--        @endif--}}
    {{--        @if(session()->has('success_add'))--}}
    {{--            <div data-toggle="alert" data-time="5000" class="alert alert-success">--}}
    {{--                <div class="alert-wrapper grow">--}}
    {{--                    <svg class="">--}}
    {{--                        <use xlink:href="../assets/images/icons.svg#file"></use>--}}
    {{--                    </svg>--}}
    {{--                    <span>--}}
    {{--               {{ session()->get('success_add') }}--}}
    {{--           </span></div>--}}
    {{--                <span data-toggle="dismis" class="alert-dismis"> <svg class=""> <use--}}
    {{--                            xlink:href="../assets/images/icons.svg#close"></use> </svg> </span></div>--}}

    {{--        @endif--}}

    {{--    </section>--}}
    <header class=" relative mt-14 lg:mt-0">
        <div class="relative before:bg-primary/60 before:absolute before:inset-0 ">
            <img src="{{ asset('assets/images/banner/about.png') }}" alt="" class="aspect-[13/5]">
        </div>

        <div class="absolute flex  pb-1 pt-5 lg:py-3 flex-col justify-end items-center inset-0 text-white text-center">
            <h1 class=" lg:text-3xl font-semibold">با ما در تماس باشید ...</h1>
            <div class="w-1 h-6 my-1 lg:my-4 bg-secondary"></div>
            <h2 class="mx-3 lg:w-1/3 text-lg text-sm lg:text-2xl border-2 border-white py-3 px-4">سوال دارید؟ اطلاعات و
                توضیحات بیشتری نیاز دارید؟</h2>
            <div class="w-1 h-10 lg:h-32 mt-1 lg:mt-4 bg-secondary"></div>
        </div>

    </header>


    <section class="container space-y-3 lg:space-y-6 py-3 lg:py-16">
        <div class="border-r-4 border-primary h-7 hidden lg:block"></div>
        <div>
            <h3 class="font-semibold text-2xl lg:text-4xl text-primary border-r-4 lg:border-r-0 border-primary lg:pr-0 pr-3">
                تماس با ما</h3>
            <h4 class="text-gray-500"></h4>
        </div>


        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="bg-primary text-white py-5 px-4 space-y-6">
                <div class="flex items-center gap-4">
                    <svg class="w-8 h-8 shrink-0">
                        <use xlink:href="assets/images/icons.svg#location"></use>
                    </svg>
                    <p>{{ $settings->address }}</p>
                </div>

                <div class="flex items-center gap-4">
                    <svg class="w-8 h-8 shrink-0">
                        <use xlink:href="assets/images/icons.svg#phone-circle"></use>
                    </svg>
                    <p>
                        <a href="tel:{{ $settings->tel }}">{{ fixPersianCharNum($settings->tel )}}</a>
                    </p>
                </div>

                <div class="flex items-center gap-4">
                    <svg class="w-8 h-8 shrink-0">
                        <use xlink:href="assets/images/icons.svg#location"></use>
                    </svg>
                    <p>{{ fixPersianCharNum($settings->postal_code  ) }}</p>
                </div>
                <div class="flex items-center gap-4">
                    <svg class="w-8 h-8 shrink-0">
                        <use xlink:href="assets/images/icons.svg#email"></use>
                    </svg>
                    <p>{{ $settings->email }}</p>
                </div>
            </div>
            <form method="post" name="contactForm" class="space-y-6" action="{{ route('front.contact.store') }}">
                @csrf
                <div class="flex flex-col">
                    <label for="name">نام نام خانواندگی:</label>
                    <input type="text" id="name" name="name"
                           class="border-2 border-gray-300 py-1.5 px-2 outline-none w-full">
                </div>
                <div class="flex flex-col">
                    <label for="subject">موضوع:</label>
                    <select type="text" name="subject_type" id="subject"
                            class="border-2 border-gray-300 py-1.5 px-2 outline-none w-full">
                        <option value="COUNSELING"> درخواست مشاوره</option>
                        <option value="COOPERATION">درخواست همکاری</option>
                        <option value="EDUCATION"> درخواست آموزش</option>


                    </select>
                </div>
                <div class="flex flex-col">
                    <label for="mobile">تلفن همراه:</label>
                    <input type="text" id="mobile" name="mobile"
                           class="border-2 border-gray-300 py-1.5 px-2 outline-none w-full">
                </div>
                <div class="flex flex-col">
                    <label for="message">پیغام:</label>
                    <textarea id="message" name="message"
                              class="border-2 border-gray-300 py-1.5 px-2 outline-none w-full min-h-44"></textarea>
                </div>
                <button type="submit"
                        class="text-white  bg-primary transition-all duration-300 py-4 px-6 hover:bg-primary-second text-center relative before:bg-white before:w-0.5 before:h-3 before:absolute before:top-0 before:right-1/2 before:translate-x-1/2 w-full">
                    پیامتان را برای ما ارسال کنید
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

    </section>


@endsection

