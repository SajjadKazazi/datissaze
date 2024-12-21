<div>
     <header class=" relative mt-14 lg:mt-0">
        <div class="relative before:bg-primary/60 before:absolute before:inset-0">
            <img
                src="{{ $pic  ?? asset('assets/images/banner/about.png')  }}"
                alt="">
        </div>

        <div class="absolute flex  pb-1 pt-5 lg:py-3 flex-col justify-end items-center inset-0 text-white text-center">
            <h1 class=" lg:text-3xl font-semibold"> {{ $title }}</h1>
            <div class="w-1 h-6 my-1 lg:my-4 bg-secondary"></div>
            <h2 class="mx-3 lg:w-1/3 text-lg text-sm lg:text-2xl border-2 border-white py-3 px-4">
                {{ $description }}

            </h2>
            <div class="w-1 h-10 lg:h-56 mt-1 lg:mt-4 bg-secondary"></div>
        </div>

    </header>
</div>
