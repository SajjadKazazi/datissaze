@extends('front.layouts.main')

@section('content')

    <x-front.partials.pages.header :title="$page->title" :description="$page->description" />

    <div class="container text-justify leading-7 my-6 lg:my-14">
        {!! $page->body !!}
    </div>

@endsection

