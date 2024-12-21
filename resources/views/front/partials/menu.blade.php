
<ul class="flex items-center gap-3">


@if (count($menu->children) > 0)
    @if($menu->visibility)
            <li class="relative group/main">
                <a href="{{ $menu->url }}"
                   class="flex items-center gap-2 px-2 py-3 transition-all duration-300 group-hover/main:text-primary">
                    {{ $menu->title }}


                    <svg class="w-4 h-4 transition-transform duration-300 group-hover/main:rotate-180 ">
                        <use xlink:href="../assets/images/icons.svg#angle-down"></use>
                    </svg>


                </a>


                <ul
                    class="absolute right-0 z-30 flex flex-col invisible w-56 py-2 transition-all duration-300 translate-y-4 bg-white shadow-lg opacity-0 group-hover/main:opacity-100 group-hover/main:visible group-hover/main:translate-y-0 top-full rounded-xl text-secondary">

                    @foreach($menu->children as $menu)
                        @include('front.partials.menu', $menu)
                    @endforeach

                </ul>


            </li>

    @endif

@else

    @if($menu->visibility)


            <li class="relative px-2 group/submenu">
                <a href="{{ $menu->url }}"
                   class="flex items-center justify-between px-3 py-2 font-medium transition-all duration-300 rounded-lg peer-hover:bg-slate-200 bg-slate-100 hover:bg-primary">
                    {{ $menu->title }}


                </a>


            </li>
    @endif
@endif

</ul>
