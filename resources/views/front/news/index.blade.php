@extends('front.layouts.main')

@section('content')
    <header class=" relative mt-14 lg:mt-0">
        <div class="relative before:bg-primary/60 before:absolute before:inset-0 ">
            <img src="{{ asset('assets/images/banner/about.png') }}" alt="" class="aspect-[13/5]">
        </div>

        <div class="absolute flex  pb-1 pt-5 lg:py-3 flex-col justify-end items-center inset-0 text-white text-center">
            <h1 class=" lg:text-3xl font-semibold">اخبار</h1>
            <div class="w-1 h-6 my-1 lg:my-4 bg-secondary"></div>
            <h2 class="mx-3 lg:w-1/3 text-lg text-sm lg:text-2xl border-2 border-white py-3 px-4">آخرین اخبار ما</h2>
            <div class="w-1 h-10 lg:h-32 mt-1 lg:mt-4 bg-secondary"></div>
        </div>

    </header>


    <section class="container space-y-3 lg:space-y-6 py-3 lg:py-16">
        <div class="border-r-4 border-primary h-7 hidden lg:block"></div>
        <div>
            <h3 class="font-semibold text-2xl lg:text-4xl text-primary border-r-4 lg:border-r-0 border-primary lg:pr-0 pr-3">اخبار ( {{ request()->category_id !== 'all' && request()->has('category_id') ? $category_get->title : 'همه' }} )</h3>
            <h4 class="text-gray-500"></h4>
        </div>
        <div class="grid grid-cols-2 lg:grid-cols-5  lg:gap-3">
            <div class="px-4 py-4  lg:mx-0 col-span-2 lg:col-span-1   h-max bg-dark/10 lg:order-last mb-2 w-full">
                <h5 class="text-lg font-semibold">دسته
                    بندی ها</h5>
                <ul class="pr-2 mt-3 mb-2 space-y-3 font-medium">
{{--                    @if($categories)--}}
{{--                        @foreach($categories as $category)--}}
{{--                            <li><a href="#" class="relative inline-block pr-3 hover:before:bg-secondary before:transition-all before:duration-300 transition-all duration-300 before:absolute before:block hover:text-secondary hover:pr-5 hover:before:scale-125 before:w-1.5 before:h-1.5 before:rounded-full before:right-0 before:top-1/2 before:-translate-y-1/2 before:bg-dark">--}}
{{--                                    {{ $category->title }}</a></li>--}}
{{--                        @endforeach--}}
{{--                    @endif--}}

                        @if($categories)
                            <li><a href="{{ route('front.index.news',['category_id'=>'all']) }}" class="relative inline-block pr-3 hover:before:bg-secondary before:transition-all before:duration-300 transition-all duration-300 before:absolute before:block hover:text-secondary hover:pr-5 hover:before:scale-125 before:w-1.5 before:h-1.5 before:rounded-full before:right-0 before:top-1/2 before:-translate-y-1/2 before:bg-dark">
                                    همه</a></li>
                            @foreach($categories as $category)
                                <li><a href="{{ route('front.index.news',['category_id'=>$category->id]) }}" class="relative inline-block pr-3 hover:before:bg-secondary before:transition-all before:duration-300 transition-all duration-300 before:absolute before:block hover:text-secondary hover:pr-5 hover:before:scale-125 before:w-1.5 before:h-1.5 before:rounded-full before:right-0 before:top-1/2 before:-translate-y-1/2 before:bg-dark">
                                        {{ $category->title }}</a></li>
                            @endforeach
                        @endif



                </ul>
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-1 lg:gap-3 col-span-4">
                @forelse($news as $new)
                    <div class="border transition-shadow group duration-300   overflow-hidden flex flex-col pb-4">
                        <div class="aspect-[3/2] overflow-hidden"><img src="{{ asset($new->thumbnail)  }}" alt="{{ $new->title }}" class="aspect-[3/2] object-cover transition-transform duration-500 transform group-hover:scale-105">
                        </div>
                        <div class="mt-4 lg:mt-8 space-y-4 flex flex-col lg:px-6 px-3 lg:pb-4  ">
                            <h3 class="text-base lg:text-2xl font-semibold text-gray-800 lg:h-16 h-12 py-2   leading-tight line-clamp-2">
                                {{ $new->title }}</h3>

                            <p class="text-sm lg:text-base text-gray-600 leading-snug lg:h-12 line-clamp-2">
                                {{ $new->description }}
                            </p>

                            <div class="flex items-center justify-between mt-4 text-gray-500 text-sm">
                                <span class="font-light">{{ \Morilog\Jalali\Jalalian::forge($new->created_at)->format('Y/m/d') }}</span>

                                <a href="{{ route('front.single.news',['slug'=>$new->slug])  }}" class="lg:py-2 py-1 px-3 lg:px-6 mt-1 border border-primary text-primary font-medium rounded-md transition-all duration-300 hover:bg-primary hover:text-white focus:ring-2 focus:ring-primary">
                                    بیشتر
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse

            </div>



        </div>


    </section>



@endsection

