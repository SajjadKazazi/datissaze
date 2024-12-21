@extends('front.layouts.main')

@section('content')

    <div class="container lg:px-10 xl:px-3">
        <div
            class="relative z-10 before:h-full before:w-full before:block before:bg-gradient-to-r before:from-primary-hover before:to-primary before:absolute before:-top-5 before:-z-10 before:rounded-xl lg:before:rounded-3xl before:-rotate-2 before:scale-105">
            <div
                class="relative z-10 py-12 overflow-hidden text-white bg-center bg-no-repeat bg-cover lg:py-24 xl:py-32 before:-z-10 rounded-b-xl lg:rounded-b-3xl before:absolute before:inset-0 before:bg-secondary/50"
                style="background-image: url('{{ asset('assets/images/slide-01.webp') }}');">
                <h1 class="z-10 text-xl font-bold text-center lg:text-3xl">
                 همکاران
                </h1>
            </div>
        </div>
    </div>


    <div class="px-3 mt-5 lg:px-0 lg:container lg:mt-10">

        {{ $category->description }}

        <h4 class="mt-5 text-xl font-bold text-center lg:mt-10 lg:text-3xl">{{ $category->title }}</h4>


        <div class="flex flex-wrap mt-32 gap-y-32">

            @foreach($staffs as $staff)
            <div class="w-1/2 lg:w-1/4 px-1 py-2 lg:py-4 lg:px-3 relative block">
                <div class="px-2 pt-2 pb-4 bg-white lg:px-8 lg:pt-4 lg:pb-6 shadow-project rounded-2xl">
                    <a href="#" class="block -mt-32 overflow-hidden rounded-full aspect-square">
                        <img src="{{ asset($staff->avatar) }}"
                             class="w-full transition-all duration-300 hover:scale-105" alt="{{ $staff->name }}">
                    </a>
                    <div class="flex justify-center mt-2 text-sm font-medium"><span
                            class="px-4 py-2 text-center rounded-lg bg-light">{{ $staff->job }}</span>
                    </div>
                    <h4 class="mt-2 font-semibold text-center truncate lg:text-xl lg:mt-3"><a href="#"
                                                                                              class="transition-all duration-300 hover:text-primary-hover">
                        {{ $staff->name }}
                        </a></h4>
                </div>
            </div>
            @endforeach

        </div>


    </div>

@endsection

