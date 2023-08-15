@extends('layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/courseflowchart.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('sidebar.curriculumplan')
            <!-- 右邊內容 -->
            <div class="col-12 col-lg-10 ">
                <div class="col-12 d-flex justify-content-between ">
                    <span>
                        <h1 class="fs-18 color-red mt-5 shared-title height-25 "><b class="shared-disc">
                                課程流程圖</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{route('Home')}}" class="color-gray">首頁</a></li><span>></span>
                        <li><a href="{{route('curriculumplan')}}" class="color-gray">課程架構</a></li><span>></span>
                        <li>課程流程圖</li>
                    </ul>
                </div>
                <div class="col-12 mt-2">
                    <form action='{{ route('courseflowchart') }}' method='POST'>
                        @csrf
                        <select name = "year" onchange="location.href='courseflowchart?year='+this.value">
                            <option value="0">請選擇</option>
                            @foreach ( $options_year as $option_year)
                            <option value="{{$option_year->year}}">{{$option_year->year}}</option>
                            @endforeach
                        </select>&nbsp;學年度
                    </form>
                </div>
                <div class="col-12 mt-3">
                    <h3 class="shared_subtitle fs-18"><i class="fa-solid fa-circle-arrow-right mr-2"></i>簡介</h3>
                    <table class="table table-striped shared_table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" width="70%">檔案名稱</th>
                                <th scope="col" width="30%">檔案連結</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $courseflowcharts as $courseflowchart)
                            <tr>
                                <th scope="row" width="70%">{{substr($courseflowchart->file,0,-4)}}</th>
                                <td>
                                    <a href="{{ asset('img/courseprocess/'.$courseflowchart->file) }}"><img src="{{ asset('img/doc.png') }}" alt=""></a>
                                </td>
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
