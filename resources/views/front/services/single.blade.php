
@extends('front.layouts.main')

@section('content')


    <x-front.partials.pages.header :title="$service->title" :description="strip_tags($service->description)" />

    <div class="container text-justify leading-7 my-6 lg:my-14">
        {!! $service->body !!}
    </div>


@endsection

