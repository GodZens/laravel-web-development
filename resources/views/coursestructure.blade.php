@extends('layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/coursestructure.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('sidebar.curriculumplan')
            <!-- 右邊內容 -->
            <div class="col-12 col-lg-10 ">
                <div class="col-12 d-flex justify-content-between ">
                    <span>
                        <h1 class="fs-18 color-red mt-5  height-25 shared-title"><b class="shared-disc">
                                課程架構圖</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{route('Home')}}" class="color-gray">首頁</a></li><span>></span>
                        <li><a href="{{route('curriculumplan')}}" class="color-gray">課程架構</a></li><span>></span>
                        <li>課程架構圖</li>
                    </ul>
                </div>
                <div class="col-12 mt-2">
                    <form action='{{ route('coursestructure') }}' method='POST'>
                        @csrf
                        <select name = "year" onchange="location.href='coursestructure?year='+this.value">
                            <option value="0">請選擇</option>
                            @foreach ( $options_year as $option_year)
                            <option value="{{$option_year->year}}">{{$option_year->year}}</option>
                            @endforeach
                        </select>&nbsp;學年度
                    </form>
                </div>
                <div class="col-12 mt-3 mb-3">
                    @foreach ( $coursestructures as $coursestructure)
                    <img class="w-100" src="{{ asset('img/courseprocess/'.$coursestructure->file) }}" alt="課程地圖">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
@endsection
