@extends('layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/secondlang.css') }}">
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
                            第二外語</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{route('Home')}}" class="color-gray">首頁</a></li><span>></span>
                        <li><a href="{{route('curriculumplan')}}" class="color-gray">課程架構</a></li><span>></span>
                        <li>第二外語</li>
                    </ul>
                </div>
                @foreach ($secondlangs as $secondlang)
                    <div class="col-12 mt-3">
                        {!! $secondlang->dtext !!}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('javascript')
@endsection
