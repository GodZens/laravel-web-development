@extends('en.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ad_alumni.css') }}">
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            @include('en.sidebar.admissions')
            <!-- 右邊內容 -->
            <div class="col-12 col-lg-10 ">
                <div class="col-12 d-flex justify-content-between ">
                    <span>
                        <h1 class="fs-18 color-red mt-5 height-25 "><b class="shared-disc">
                            Benchmark alumni</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{ route('en_home') }}" class="color-gray"> front page</a></li><span>></span>
                        <li><a href="{{ route('en_admissions', ['year' => '111學年度四技二專「甄選入學」招生選才內涵- 外語群英語類']) }}" class="color-gray">Admissions</a></li>
                        <span>></span>
                        <li>Benchmark alumni</li>

                    </ul>
                </div>
                <div class="col-12 mt-3">
                    <table class="equipment_table w-100" border="1px">
                        <tbody>
                            <tr>
                                <td><strong><span>name</span></strong></td>
                                <td><strong><span>Working unit</span></strong></td>
                                <td><strong><span>excellent performance</span></strong></td>
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
