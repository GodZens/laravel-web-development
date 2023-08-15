@extends('en.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/coursefeature.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('en.sidebar.curriculumplan')
            <!-- 右邊內容 -->
            <div class="col-12 col-lg-10 ">
                <div class="col-12 d-flex justify-content-between ">
                    <span>
                        <h1 class="fs-18 color-red mt-5  height-25 shared-title"><b class="shared-disc">
                            course features</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{route('en_home')}}" class="color-gray">front page</a></li><span>></span>
                        <li><a href="{{route('en_curriculumplan')}}" class="color-gray">Curriculum Planning</a></li><span>></span>
                        <li>course features</li>
                    </ul>
                </div>
                @foreach ($coursefeatures as $coursefeature)
                    <div class="col-12 mt-3">
                        {!! $coursefeature->dtext_en !!}
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
@section('javascript')
@endsection
