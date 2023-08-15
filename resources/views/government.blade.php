@extends('layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/government.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('sidebar.partner')
            <!-- 右邊內容 -->
            <!-- 右邊內容 -->
            <div class="col-12 col-lg-10 ">
                <div class="col-12 d-flex justify-content-between ">
                    <span>
                        <h1 class="fs-18 color-red mt-5 height-25 shared-title"><b class="shared-disc">
                                政府部門補助</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{route('Home')}}" class="color-gray"> 首頁</a></li><span>></span>
                        <li><a href="{{route('partner_link')}}" class="color-gray"> 產學連結</a></li><span>></span>
                        <li>政府部門補助</li>

                    </ul>
                </div>
                <div class="col-12 mt-2">
                    <form action='{{ route('government') }}' method='POST'>
                        <select onchange="location.href='government?year='+this.value">
                            <option value="0">請選擇</option>
                            @foreach ($options_year as $option_year)
                                <option value="{{ $option_year->year }}">{{ $option_year->year }}</option>
                            @endforeach
                        </select>&nbsp;學年度
                    </form>
                </div>
                <div class="col-12 mt-3">
                    <table class=" shared_table  table-border table">
                        <thead>
                            <tr>
                                <th scope="col" width="20%" class="text-center">計畫執行時間</th>
                                <th scope="col" width="20%" class="text-center">計畫結束日期</th>
                                <th scope="col" width="40%" class="text-center">計劃名稱</th>
                                <th scope="col" width="20%" class="text-center">計劃主持人</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($governments as $government)
                                <tr>
                                    <th scope="row">{{ $government->date }}</th>
                                    <td>{{ $government->firm }}</td>
                                    <td>{{ $government->projectname }}</td>
                                    <td class="text-center">{{ $government->leader }}</td>
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
