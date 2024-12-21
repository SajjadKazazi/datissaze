<section
    class="container flex flex-col gap-4 mt-10 xl:mt-20 lg:gap-5 xl:gap-10 lg:flex-row lg:items-center lg:justify-center">

    <div class="p-4 lg:w-5/12 xl:w-1/3 group rounded-2xl bg-gradient-to-b from-primary-hover to-primary text-secondary">

        <div class="flex items-center gap-2 lg:gap-3">
            <div
                class="flex items-center justify-center w-20 h-20 bg-white rounded-full shrink-0 lg:w-24 lg:h-24 xl:w-28 xl:h-28">
                <svg class="text-primary w-10 xl:w-14 group-hover:-scale-x-100 transition-all duration-300 ">
                    <use xlink:href="{{ asset('assets/images/icons.svg#email') }}"></use>
                </svg>
            </div>
            <div>
                <h4 class="text-xl font-semibold lg:text-2xl">پیشنهادات برای پیش برد شرکت</h4>
                <p class="font-medium xl:text-lg">شما می‌تونین پیشنهادات خودتون رو با ما در میان بگذارید</p>
            </div>
        </div>

        <div class="flex justify-end">
            <a href="/contact" class="btn-outline btn-secondary">ارسال پیام</a>
        </div>

    </div>
    <div class="p-4 text-white lg:w-5/12 xl:w-1/3 group rounded-2xl bg-secondary">

        <div class="flex items-center gap-2 lg:gap-3">
            <div
                class="flex items-center justify-center w-20 h-20 bg-white rounded-full shrink-0 lg:w-24 lg:h-24 xl:w-28 xl:h-28">

                <svg class="text-primary w-10 xl:w-14 group-hover:-scale-x-100 transition-all duration-300 ">
                    <use xlink:href="{{ asset('assets/images/icons.svg#email') }}"></use>
                </svg>
            </div>
            <div>
                <h4 class="text-xl font-semibold lg:text-2xl">انتقادات برای پیش برد شرکت</h4>
                <p class="font-medium xl:text-lg">شما می‌تونین انتقادات خودتون رو با ما در میان بگذارید</p>
            </div>
        </div>

        <div class="flex justify-end">
            <a href="/contact" class="btn-outline btn-primary">ارسال پیام</a>
        </div>

    </div>

</section>
