@extends('en.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/teacher.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('en.sidebar.teacher')
            <!-- 老師介紹 -->
            <div class="col-12 col-lg-10">
                <div class="row">
                    <div class="col-12 mb-2">
                        <h1>
                            <b class="teacher-title">Teacher presentation</b>
                            <span class="dottedline d-block"></span>
                        </h1>
                    </div>
                    @foreach ($F_teachers as $F_teacher)
                        <div class="col-lg-5 col-12 content-space">
                            <div class="d-flex justify-content-center">
                                <a href="{{route('en_teacher_content',['name' => $F_teacher->name])}}">
                                    <img class="teacher-pic" src="{{ asset('img/teacher/'.$F_teacher->name.'.jpg') }}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-12 teacher-pic d-flex flex-wrap mb-2">
                            <div class="col-12 d-flex ">
                                <div class="col-8 p-0">
                                    <span class="d-block">{{$F_teacher->ename}}</span>
                                    <span class="d-block">{{$F_teacher->eposition}}</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <span>{{$F_teacher->eeducation}}</span><br>
                                <span>{{$F_teacher->eposition}}</span><br>
                                <span>E-mail：<a href="mailto:{{$F_teacher->email}}">{{$F_teacher->email}}</a></span><br>
                                <span>Extension:{{$F_teacher->extension}}</span><br>
                                <span>laboratory:{{$F_teacher->Researchroom}}</span>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <span class="dottedline d-block"></span>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- 老師介紹 -->
        </div>
    </div>
@endsection
@section('javascript')
@endsection
