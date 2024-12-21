
@if(!is_null($service))
    <section class="overflow-hidden xl:pb-20">
        <div
            class="container flex flex-col-reverse px-5 py-5 mx-3 mt-28 lg:py-0 lg:flex-row lg:mt-44 service-section lg:mx-auto lg:bg-transparent rounded-xl lg:rounded-none bg-gradient-to-bl from-primary to-primary-hover lg:bg-none">


            <div class="absolute hidden inset-x-10 xl:inset-0 -z-10 lg:block">
                <img src="{{ asset('assets/images/service-pattern.svg') }}" class="w-full" alt="">
            </div>

            <div class="lg:pt-8 xl:pt-20 lg:pr-10 lg:w-3/5 xl:w-1/2">
                <h3 class="mb-5 text-xl font-semibold text-white xl:mb-10 lg:text-2xl xl:text-3xl">
                    {{ $service->title }}
                </h3>

                <div class="flex flex-col gap-4 lg:gap-0 lg:pb-10 xl:pb-0 lg:flex-row lg:items-end lg:justify-between">

                    {!! $service->description !!}

                    <a href="{{ route('front.single.services',$service->slug) }}" class="text-white btn btn-secondary">بیشتر بدانید</a>

                </div>


            </div>
            <div class="flex items-center justify-center pb-16 lg:justify-end lg:w-2/5 xl:w-1/2">
                <div class="relative z-10 -mt-20 xl:-mt-10 lg:pl-10 xl:pl-20">
                    <div
                        class="rotate-[20deg] bg-secondary w-56 lg:w-64 xl:w-[24rem] aspect-square rounded-2xl lg:rounded-3xl xl:rounded-[3rem] absolute -z-10">
                    </div>
                    <img src="{{ asset($service->image) }}" alt=""
                         class="w-56 lg:w-64 xl:w-[24rem] aspect-square rounded-2xl lg:rounded-3xl xl:rounded-[3rem]">
                </div>
            </div>

        </div>
    </section>


@endif
