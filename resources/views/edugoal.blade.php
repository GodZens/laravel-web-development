@extends('layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/edugoal.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('sidebar.depintroduct')
            <div class="col-12 col-lg-10 ">
                <div class="col-12 d-flex justify-content-between ">
                    <span>
                        <h1 class="fs-18 color-red mt-5  height-25 shared-title"><b class="shared-disc">
                                教育目標</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{route('Home')}}" class="color-gray">首頁</a></li><span>></span>
                        <li><a href="{{route('depintroduct')}}" class="color-gray">系所簡介</a></li><span>></span>
                        <li>教育目標</li>
                    </ul>
                </div>
                @foreach ($depintroducts as $depintroduct)
                    <div class="col-12 mt-3">
                        {!! $depintroduct->dtext !!}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('javascript')
@endsection
