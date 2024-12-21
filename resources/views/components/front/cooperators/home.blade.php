<section class="container space-y-3 lg:space-y-6 py-3 lg:py-16">
    <div class="border-r-4 border-primary h-7 hidden lg:block"></div>
    <div>
        <h3 class="font-semibold text-2xl lg:text-4xl text-primary border-r-4 lg:border-r-0 border-primary lg:pr-0 pr-3">
            مشتریان</h3>
        <h4 class="text-gray-500">مجموعه‌ها و شرکت‌هایی که در کنارشان بوده‌ایم</h4>
    </div>
</section>
<section class="bg-primary text-white py-5 lg:py-10 px-4 lg:px-5">
    <div id="customers" class="">
        @foreach($cooperators as $cooperator)
            <div>

                <div class="flex justify-center items-center">
                    <img src="{{ asset($cooperator->img) }}" alt="">
                </div>
            </div>
        @endforeach
    </div>

    <div class="flex justify-center mt-6 lg:mt-14">
        <h5 class="border-r-2 border-secondary px-3 lg:text-xl">با ما دیده می‌شوید ...</h5>
    </div>

</section>
