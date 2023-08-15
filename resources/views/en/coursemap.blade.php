@extends('en.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/coursemap.css') }}">
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
                            Course Map</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{route('en_home')}}" class="color-gray">front page</a></li><span>></span>
                        <li><a href="{{route('en_curriculumplan')}}" class="color-gray">Curriculum Planning</a></li><span>></span>
                        <li>Course Map</li>
                    </ul>
                </div>
                <div class="col-12 mt-2">
                    <form action='{{ route('en_coursemap') }}' method='POST'>
                        @csrf
                        <select name = "year" onchange="location.href='en_coursemap?year='+this.value">
                            <option value="0">please choose</option>
                            @foreach ( $options_year as $option_year)
                            <option value="{{$option_year->year}}">{{$option_year->year}}</option>
                            @endforeach
                        </select>&nbsp;school year
                    </form>
                </div>
                <div class="col-12 mt-3 mb-3">
                    @foreach ( $coursemaps as $coursemap)
                    <img class="w-100" src="{{ asset('img/courseprocess/'.$coursemap->file) }}" alt="課程地圖">
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
@endsection
