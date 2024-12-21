<section class="container space-y-3 lg:space-y-6 py-3 lg:py-16">
    <div class="border-r-4 border-primary h-7 hidden lg:block"></div>
    <div>
        <h3 class="font-semibold text-2xl lg:text-4xl text-primary border-r-4 lg:border-r-0 border-primary lg:pr-0 pr-3">نمونه کار‌ها</h3>
        <h4 class="text-gray-500">گوشه‌ای از آنچه در شرکت  ارائه می‌شود</h4>
    </div>

    <!--        <div id="" class="grid grid-cols-2 lg:grid-cols-4 gap-1 lg:gap-2">-->
    <div id="projects" class="grid grid-cols-2 lg:grid-cols-4 gap-1 lg:gap-2">

        @foreach($projects as $project)

            <div class="px-0.5 lg:px-0">
                <a href="{{ route('front.single.projects',$project->slug) }}" class=" aspect-[5/9] group flex flex-col items-center justify-end py-10 px-6 text-transparent hover:text-dark text-center relative overflow-hidden z-10 bg-cover bg-center before:-z-10 transition-all duration-300 hover:before:bg-white/80 before:transition-all before:duration-300 before:bg-black/30 before:absolute before:inset-0" style="background-image: url('{{ asset($project->thumbnail) }}')">
                    <h4 class="text-xl lg:text-3xl font-semibold">{{ $project->title }}</h4>
                    <div>{{ $project->category}}</div>
                    <div>بیشتر ...</div>
                </a>
            </div>
        @endforeach
    </div>

</section>

