@extends('front.layouts.main')
@section('content')
    <x-front.partials.pages.header title="نتایج جستجو:" :description="request()->get('query')"/>

    <section class="container space-y-3 lg:space-y-6 py-3 lg:py-16">
        @if(!empty($searchResults))

            @if(array_key_exists('services',$searchResults))

                <h4 class="mt-5 text-xl font-bold text-center lg:mt-16 lg:text-3xl">خدمات</h4>

                <div class="grid grid-cols-2 lg:grid-cols-4">
                    @if(count($searchResults['services']))

                    @foreach($searchResults['services'] as $service)
                    <a href="{{ route('front.single.services',$service->searchable->slug) }}"
                       class="border transition-background group duration-300 hover:text-white hover:bg-primary text-center text-lg border-gray-300 flex flex-col items-center pt-6 lg:pt-20 pb-4 lg:pb-14 px-5">
                        <svg class="lg:w-44 w-24 h-24 lg:h-44 text-primary group-hover:text-current">
                            <use xlink:href="assets/images/icons.svg#idea"></use>
                        </svg>
                        <div class="mt-6 lg:mt-10 space-y-4 lg:space-y-6">
                            <h3 class="text-xl lg:text-4xl font-semibold ">{{ $service->searchable->title }}</h3>
                            <div class=" invisible opacity-0 group-hover:visible group-hover:opacity-100">بیشتر ...</div>
                        </div>
                    </a>
                    @endforeach
                    @endif
                </div>


            @endif

            @if(array_key_exists('portfolios',$searchResults))
                <h4 class="mt-5 text-xl font-bold text-center lg:mt-16 lg:text-3xl">پروژه های انجام شده</h4>

                    <div id="projects" class="grid grid-cols-2 lg:grid-cols-4 gap-1 lg:gap-2">
                        @foreach($searchResults['portfolios'] as $project)

                            <div class="px-0.5 lg:px-0">
                                <a href="{{ route('front.single.projects',$project->searchable->slug) }}"
                                   class=" aspect-[5/9] group flex flex-col items-center justify-end py-10 px-6 text-transparent hover:text-dark text-center relative overflow-hidden z-10 bg-cover bg-center before:-z-10 transition-all duration-300 hover:before:bg-white/80 before:transition-all before:duration-300 before:bg-black/30 before:absolute before:inset-0"
                                   style="background-image: url('{{ asset($project->searchable->thumbnail) }}')">
                                    <h4 class="text-xl lg:text-3xl font-semibold">{{ $project->searchable->title }}</h4>
                                    <div>{{ $project->searchable->category }}</div>
                                    <div>بیشتر ...</div>
                                </a>
                            </div>

                        @endforeach
                    </div>
                    <div class="flex flex-wrap">


                </div>
            @endif

        @else
            اطلاعاتی جهت نمایش وجود ندارد
        @endif


    </section>

@endsection

