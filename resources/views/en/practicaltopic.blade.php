@extends('en.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/practicaltopic.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('en.sidebar.practicaltopic')
            <!-- 右邊內容 -->
            <div class="col-12 col-lg-10 ">
                <div class="col-12 d-flex justify-content-between ">
                    <span>
                        <h1 class="fs-18 color-red mt-5 download-title height-25 "><b class="download-disc">
                            Practical Thematic Results (Practice Group)</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{ route('en_home') }}" class="color-gray"> front page</a></li><span>></span>
                        <li><a href="{{ route('en_students', ['year' => date('Y') - 1911]) }}" class="color-gray"> Student Zone</a>
                        </li><span>></span>
                        <li> Practical Thematic Results</li>
                    </ul>
                </div>
                <div class="col-12 mt-2">
                    <form action='{{ route('en_practicaltopic') }}' method='POST'>
                        @csrf
                        <select name="year" onchange="location.href='en_practicaltopic?year='+this.value">
                            <option value="0">please choose</option>
                            @foreach ($practical_topics_years as $practical_topics_year)
                                <option value="{{ $practical_topics_year->year }}">{{ $practical_topics_year->year }}
                                </option>
                            @endforeach
                        </select>&nbsp;school year
                    </form>
                </div>
                <div class="col-12 mt-3">
                    <table class="table table-striped download_table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" width="25%">student ID</th>
                                <th scope="col" width="25%">student name</th>
                                <th scope="col" width="25%">Topics</th>
                                <th scope="col" width="25%">instructor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($specialtopics as $specialtopic)
                                <tr>
                                    <td>{{$specialtopic->number}}</td>
                                    <td>{{$specialtopic->ename}}</td>
                                    <td>{{$specialtopic->etopic}}</td>
                                    <td>{{$specialtopic->eteacher}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
@endsection
