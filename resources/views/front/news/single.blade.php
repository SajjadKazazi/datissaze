@extends('front.layouts.main')

@section('content')

    <header class=" relative mt-14 lg:mt-0">
        <div class="relative before:bg-primary/60 before:absolute before:inset-0 ">
            <img src="{{ asset('assets/images/banner/about.png') }}" alt="" class="aspect-[13/5]">
        </div>

        <div class="absolute flex  pb-1 pt-5 lg:py-3 flex-col justify-end items-center inset-0 text-white text-center">
            <h1 class=" lg:text-3xl font-semibold">اخبار</h1>
            <div class="w-1 h-6 my-1 lg:my-4 bg-secondary"></div>
            <h2 class="mx-3 lg:w-1/3 text-lg text-sm lg:text-2xl border-2 border-white py-3 px-4">{{ $news->title }}</h2>
            <div class="w-1 h-10 lg:h-32 mt-1 lg:mt-4 bg-secondary"></div>
        </div>

    </header>


    <section class="container space-y-3 lg:space-y-6 py-3 lg:py-16">
        <div class="border-r-4 border-primary h-7 hidden lg:block"></div>
        <div>
            <h3 class="font-semibold text-2xl lg:text-4xl text-primary border-r-4 lg:border-r-0 border-primary lg:pr-0 pr-3">
                {{ $news->title }}</h3>
            <h4 class="text-gray-500"></h4>
        </div>
        <p class="lg:text-lg text-justify leading-7">
            {!! $news->body !!}
        </p>


    </section>

@endsection
