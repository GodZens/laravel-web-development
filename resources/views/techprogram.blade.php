@extends('layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/techprogram.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('sidebar.partner')
            <!-- 右邊內容 -->
            <div class="col-12 col-lg-10 ">
                <div class="col-12 d-flex justify-content-between ">
                    <span>
                        <h1 class="fs-18 color-red mt-5 height-25 shared-title"><b class="shared-disc">
                                科技部計畫</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{route('Home')}}" class="color-gray"> 首頁</a></li><span>></span>
                        <li><a href="{{route('partner_link')}}" class="color-gray"> 產學連結</a></li><span>></span>
                        <li>科技部計畫</li>

                    </ul>
                </div>
                <div class="col-12 mt-2">
                    <form action='{{ route('techprogram') }}' method='POST'>
                        <select onchange="location.href='techprogram?year='+this.value">
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
                            @foreach ($techprograms as $techprogram)
                                <tr>
                                    <th scope="row">{{ $techprogram->plan_start }}</th>
                                    <td>{{ $techprogram->plan_end }}</td>
                                    <td>{{ $techprogram->projectname }}</td>
                                    <td class="text-center">{{ $techprogram->leader }}</td>
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
