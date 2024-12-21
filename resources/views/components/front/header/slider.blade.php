
<header class="">
    <div id="slider" class=" overflow-hidden aspect-[13/5] relative">
        @foreach($sliders as $slider)
            <a href="{{ $slider->action }}" target="_blank">
                <img class="w-full" src="{{ $slider->img }}" alt="{{ $slider->title }}" />
            </a>
        @endforeach

    </div>
</header>

