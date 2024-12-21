<?php
// config
$link_limit = 5; // maximum number of links (a little bit inaccurate, but will be ok for now)
?>
@if($model->appends(Request::except('page'))->hasPages())
    <ul class="flex justify-center gap-2 mt-10 font-semibold">
        <li><a href="{{  $model->appends(Request::except('page'))->url(1)  }}" class="w-10 h-10 p-0 btn btn-primary">
                <svg class="w-5 h-5 rotate-180">
                    <use xlink:href="../assets/images/icons.svg#arrow-left"></use>
                </svg>
            </a></li>
        @for ($i = 1; $i <= $model->appends(Request::except('page'))->lastPage(); $i++)
                <?php
                $half_total_links = floor($link_limit / 2);
                $from = $model->appends(Request::except('page'))->currentPage() - $half_total_links;
                $to = $model->appends(Request::except('page'))->currentPage() + $half_total_links;
                if ($model->appends(Request::except('page'))->currentPage() < $half_total_links) {
                    $to += $half_total_links - $model->appends(Request::except('page'))->currentPage();
                }
                if ($model->appends(Request::except('page'))->lastPage() - $model->appends(Request::except('page'))->currentPage() < $half_total_links) {
                    $from -= $half_total_links - ($model->appends(Request::except('page'))->lastPage() - $model->appends(Request::except('page'))->currentPage()) - 1;
                }
                ?>
            @if ($from < $i && $i < $to)
                <li class="group {{ ($model->appends(Request::except('page'))->currentPage() == $i) ? ' active' : '' }}">
                    <a href="{{ $model->appends(Request::except('page'))->url($i) }}"
                                            class="flex items-center hover:ring-4 hover:ring-slate-100 group-[.active]:bg-slate-200 group-[.active]:border-slate-100 justify-center w-10 h-10 transition-all duration-300 border rounded-lg border-slate-300">
                        {{ $i }} </a></li>
            @endif

        @endfor


        <li><a href="{{ $model->appends(Request::except('page'))->currentPage() !=$model->appends(Request::except('page'))->lastPage() ?  $model->appends(Request::except('page'))->url($model->appends(Request::except('page'))->currentPage()+1) : '' }}" class="w-10 h-10 p-0 btn btn-primary">
                <svg class="w-5 h-5">
                    <use xlink:href="../assets/images/icons.svg#arrow-left"></use>
                </svg>
            </a></li>
    </ul>

@endif
