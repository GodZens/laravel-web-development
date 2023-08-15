@extends('layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/practicaltopic.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('sidebar.practicaltopic')
            <!-- 右邊內容 -->
            <div class="col-12 col-lg-10 ">
                <div class="col-12 d-flex justify-content-between ">
                    <span>
                        <h1 class="fs-18 color-red mt-5 download-title height-25 "><b class="download-disc">
                                實務專題成果(實習組)</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{ route('Home') }}" class="color-gray"> 首頁</a></li><span>></span>
                        <li><a href="{{ route('students', ['year' => date('Y') - 1911]) }}" class="color-gray"> 學生專區</a>
                        </li><span>></span>
                        <li> 實務專題成果</li>
                    </ul>
                </div>
                <div class="col-12 mt-2">
                    <form action='{{ route('practicaltopic') }}' method='POST'>
                        @csrf
                        <select name="year" onchange="location.href='practicaltopic?year='+this.value">
                            <option value="0">請選擇</option>
                            @foreach ($practical_topics_years as $practical_topics_year)
                                <option value="{{ $practical_topics_year->year }}">{{ $practical_topics_year->year }}
                                </option>
                            @endforeach
                        </select>&nbsp;學年度
                    </form>
                </div>
                <div class="col-12 mt-3">
                    <table class="table table-striped download_table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" width="25%">學號</th>
                                <th scope="col" width="25%">學生姓名</th>
                                <th scope="col" width="25%">專題題目</th>
                                <th scope="col" width="25%">指導老師</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($specialtopics as $specialtopic)
                                <tr>
                                    <td>{{$specialtopic->number}}</td>
                                    <td>{{$specialtopic->name}}</td>
                                    <td>{{$specialtopic->topic}}</td>
                                    <td>{{$specialtopic->teacher}}</td>
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
