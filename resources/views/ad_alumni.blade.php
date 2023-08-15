@extends('layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ad_alumni.css') }}">
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
                            標竿校友</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{ route('Home') }}" class="color-gray"> 首頁</a></li><span>></span>
                        <li><a href="{{ route('admissions', ['year' => '111學年度四技二專「甄選入學」招生選才內涵- 外語群英語類']) }}" class="color-gray">招生專區</a></li>
                        <span>></span>
                        <li>標竿校友</li>

                    </ul>
                </div>
                <div class="col-12 mt-3">
                    <table class="equipment_table w-100" border="1px">
                        <tbody>
                            <tr>
                                <td><strong><span>名稱</span></strong></td>
                                <td><strong><span>任職單位</span></strong></td>
                                <td><strong><span>優秀表現</span></strong></td>
                            </tr>
                            @foreach ( $alumnis as $alumni)
                            <tr>
                                <td class="text-center" width="50%">
                                    <span class="d-block">{{$alumni->classname}}</span>
                                    <img class="w-100 classroom_pic" src="{{ asset('download/'.$alumni->img) }}">
                                </td>
                                <td class="text-center" width="17%">
                                    <ul>
                                        <li>{{$alumni->equipment}}</li>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <li>{!!$alumni->performance!!}</li>
                                    </ul>
                                </td>
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
