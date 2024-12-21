@if($articles->isNotEmpty())
    <section class="container space-y-3 lg:space-y-6 py-3 lg:py-16">
        <div class="border-r-4 border-primary h-7 hidden lg:block"></div>
        <div class="flex justify-between">
            <div>
                <h3 class="font-semibold text-2xl lg:text-4xl text-primary border-r-4 lg:border-r-0 border-primary lg:pr-0 pr-3">
                    مقالات</h3>
                <h4 class="text-gray-500"></h4>
            </div>
            <div class="">
                <a href="{{ route('front.index.articles') }}"  class="text-white  bg-primary transition-all duration-300 lg:text-base text-sm py-2 px-3 lg:py-4 lg:px-6 hover:bg-primary-second text-center relative before:bg-white before:w-0.5 before:h-3 before:absolute before:top-0 before:right-1/2 before:translate-x-1/2 w-full">
                    مشاهده بیشتر</a>
            </div>
        </div>
        <div class="grid grid-cols-2 lg:grid-cols-4">
            @foreach($articles as $article)
                <div class="border transition-shadow group duration-300   overflow-hidden flex flex-col pb-4">
                    <div class="aspect-[3/2] overflow-hidden"><img src="{{ asset($article->thumbnail) }}"
                                                                   alt="{{ $article->title }}"
                                                                   class="aspect-[3/2] object-cover transition-transform duration-500 transform group-hover:scale-105">
                    </div>
                    <div class="mt-4 lg:mt-8 space-y-4 flex flex-col lg:px-6 px-3 lg:pb-4  ">
                        <a href="{{ route('front.single.articles',['slug'=>$article->slug])  }}">
                            <h3 class="text-base lg:text-2xl font-semibold text-gray-800 lg:h-16 h-12 py-2  leading-tight line-clamp-2">
                                {{ $article->title }}</h3>
                        </a>

                        <p class="text-sm lg:text-base text-gray-600 leading-snug lg:h-12 line-clamp-2">
                            {{ $article->description }}
                        </p>

                        <div class="flex items-center justify-between mt-4 text-gray-500 text-sm">
                            <span
                                class="font-light">{{ \Morilog\Jalali\Jalalian::forge($article->created_at)->format('Y/m/d') }}</span>

                            <a href="{{ route('front.single.articles',['slug'=>$article->slug])  }}"
                               class="lg:py-2 py-1 px-3 lg:px-6 mt-1 border border-primary text-primary font-medium rounded-md transition-all duration-300 hover:bg-primary hover:text-white focus:ring-2 focus:ring-primary">
                                ادامه مطلب
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </section>

@endif
