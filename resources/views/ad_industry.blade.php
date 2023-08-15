@extends('layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ad_industry.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('sidebar.admissions')
            <!-- 右邊內容 -->
            <div class="col-12 col-lg-10 ">
                <div class="col-12 d-flex justify-content-between ">
                    <span>
                        <h1 class="fs-18 color-red mt-5 height-25 "><b class="shared-disc">
                                大學部</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{ route('Home') }}" class="color-gray"> 首頁</a></li><span>></span>
                        <li><a href="{{ route('admissions', ['year' => '111學年度四技二專「甄選入學」招生選才內涵- 外語群英語類']) }}" class="color-gray">招生專區</a></li>
                        <span>></span>
                        <li>大學部</li>

                    </ul>
                </div>
                <div class="col-12">
                    <form action='{{ route('ad_industry') }}' method='POST'>
                        @csrf
                        <select name="year" onchange="location.href='ad_industry?year='+this.value">
                            <option value="0">請選擇</option>
                            @foreach ($ka_billboard_years as $ka_billboard_year)
                                <option value="{{ $ka_billboard_year->year }}">{{ $ka_billboard_year->year }}</option>
                            @endforeach
                        </select>&nbsp;學年度
                    </form>
                </div>
                <div class="col-12 mt-3">
                    <table class=" shared_table  table-border table">
                        <thead>
                            <tr>
                                <th style="width:20%">系所班級</th>
                                <th style="width:20%">姓名</th>
                                <th style="width:60%">實習單位</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($practices as $practice)
                            <tr>
                                <td style="width:20%">{{$practice->dep}}</td>
                                <td style="width:20%">{{$practice->name}}</td>
                                <td style="width:60%">{{$practice->position}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- 側邊選單+教育目標 -->
@endsection
@section('javascript')
    <script>
        // 碰到該物件自動觸發click事件
        $('.dropdown').hover(function() {
            $('.dropdown-toggle').trigger('click');
        });
    </script>
@endsection
