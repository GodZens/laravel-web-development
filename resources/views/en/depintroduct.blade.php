@extends('en.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/depintroduct.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('en.sidebar.depintroduct')
            <div class="col-12 col-lg-10 ">
                <div class="col-12 d-flex justify-content-between ">
                    <span>
                        <h1 class="fs-18 color-red mt-5  height-25 shared-title"><b class="shared-disc">
                            Department Profile</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{route('Home')}}" class="color-gray">front page</a></li><span>></span>
                        <li><a href="{{route('depintroduct')}}" class="color-gray">Department Profile</a></li><span>></span>
                        <li>Department Profile</li>
                    </ul>
                </div>
                @foreach ($depintroducts as $depintroduct)
                    <div class="col-12 mt-3">
                        {!! $depintroduct->dtext_en !!}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('javascript')
@endsection
