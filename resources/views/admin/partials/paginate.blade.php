<?php
// config
$link_limit = 9; // maximum number of links (a little bit inaccurate, but will be ok for now)
?>

@if($model->appends(Request::except('page'))->hasPages())

    <nav class="d-flex justify-content-center align-items-center mt-5 w-100">

        <ul class="pagination"
            style="text-align: center;display: inline-flex;direction: rtl;background-color: unset!important;">
            <li class="page-item">
                <a class="page-link"  href="{{  $model->appends(Request::except('page'))->url(1)  }}">
                    <span aria-hidden="true">&laquo;</span>

                </a>

            </li>
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
                    <li class="page-item{{ ($model->appends(Request::except('page'))->currentPage() == $i) ? ' active' : '' }}">
                        <a class="page-link" href="{{ $model->appends(Request::except('page'))->url($i) }}">{{ $i }}</a>
                    </li>
                @endif
            @endfor
            <li>

                <a class="page-link"
                   href="{{ $model->appends(Request::except('page'))->currentPage() !=$model->appends(Request::except('page'))->lastPage() ?  $model->appends(Request::except('page'))->url($model->appends(Request::except('page'))->currentPage()+1) : '' }}">
                    <span aria-hidden="true">&raquo;</span>

                </a>

            </li>
        </ul>


    </nav>





@endif
