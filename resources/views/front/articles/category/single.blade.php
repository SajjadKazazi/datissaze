@extends('front.layouts.main')

@section('content')
    <div class="container lg:px-10 xl:px-3">
        <div
            class="relative z-10 before:h-full before:w-full before:block before:bg-gradient-to-r before:from-primary-hover before:to-primary before:absolute before:-top-5 before:-z-10 before:rounded-xl lg:before:rounded-3xl before:-rotate-2 before:scale-105">
            <div
                class="relative z-10 py-12 overflow-hidden text-white bg-center bg-no-repeat bg-cover lg:py-24 xl:py-32 before:-z-10 rounded-b-xl lg:rounded-b-3xl before:absolute before:inset-0 before:bg-secondary/50"
                style="background-image: url('{{ asset('assets/images/slide-01.webp') }}');">
                <h1 class="z-10 text-xl font-bold text-center lg:text-3xl">
                  دسته بندی :  {{ $category->title }}
                </h1>
            </div>
        </div>
    </div>

    <div class="container flex flex-col gap-6 lg:mt-10 lg:flex-row">
        <div class="px-3 lg:px-0 lg:w-4/5">
{{--            <h5 class="text-xl font-semibold lg:text-2xl">جدیدترین خبرها</h5>--}}
            <div class="space-y-6">

                @foreach($category->news as $new)

                <div class="flex flex-col gap-3 p-2 bg-white lg:p-4 lg:gap-5 lg:flex-row rounded-2xl shadow-project">
                    <div class="relative overflow-hidden lg:w-1/5 aspect-square rounded-2xl group shrink-0"><img
                            src="{{ asset($new->thumbnail) }}" alt=""
                            class="object-cover w-full transition-all duration-300 group-hover:scale-105 aspect-square"/>
                    </div>
                    <div class="flex flex-col justify-between px-2 lg:px-0 lg:pt-5 lg:w-4/5">
                        <div><h5 class="text-lg font-semibold lg:text-xl">
                                <a href="{{ route('front.single.news',['slug'=>$new->slug])  }}" class="transition-all duration-300 hover:text-primary-hover">
                                   {{ $new->title }}</a>
                            </h5>

                            <div class="flex items-center gap-5 mt-3">
                                <div class="flex items-center gap-2">
                                    <svg class="w-5 h-5">
                                        <use xlink:href="../assets/images/icons.svg#calender"></use>
                                    </svg>
                                    <span class="pt-1">{{ \Morilog\Jalali\Jalalian::forge($new->created_at)->format('Y/m/d') }}</span></div>

                            </div>
                            <p class="mt-3">{!! $new->description !!}</div>
                        <div class="flex items-center justify-end mt-4 lg:mt-0">
                            <a href="{{ route('front.single.news',['slug'=>$new->slug])  }}" class="gap-2 btn btn-primary">
                                <span>ادامه مطلب</span>
                                <svg class="w-5 h-5">
                                    <use xlink:href="../assets/images/icons.svg#arrow-left"></use>
                                </svg>
                            </a></div>
                    </div>
                </div>
                @endforeach

            </div>

{{--                @include('front.partials.paginate',['model'=>$category->news])--}}
        </div>

    </div>


@endsection

