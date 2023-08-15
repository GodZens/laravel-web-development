@extends('layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cooperation_link.css') }}">
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
                                產學合作</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{route('Home')}}" class="color-gray"> 首頁</a></li><span>></span>
                        <li><a href="{{route('partner_link')}}" class="color-gray"> 產學連結</a></li><span>></span>
                        <li>產學合作</li>

                    </ul>
                </div>
                <div class="col-12 mt-2">
                    <form action='{{ route('cooperation_link') }}' method='POST'>
                        <select onchange="location.href='cooperation_link?year='+this.value">
                            <option value="0">請選擇</option>
                            @foreach ( $options_year as $option_year)
                            <option value="{{$option_year->year}}">{{$option_year->year}}</option>
                            @endforeach
                        </select>&nbsp;學年度
                    </form>
                </div>
                <div class="col-12 mt-3">
                    <table class=" shared_table  table-border table">
                        <thead>
                            <tr>
                                <th scope="col" width="25%" class="text-center">執行期間</th>
                                <th scope="col" width="30%" class="text-center">合作廠商</th>
                                <th scope="col" width="25%" class="text-center">計劃名稱</th>
                                <th scope="col" width="20%" class="text-center">計劃主持人</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $cooperations as $cooperation)
                            <tr>
                                <th scope="row">{{$cooperation->date}}</th>
                                <td>{{$cooperation->firm}}</td>
                                <td>{{$cooperation->projectname}}</td>
                                <td class="text-center">{{$cooperation->leader}}</td>
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
