@extends('en.layouts.layout')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ad_mastercourse.css') }}">
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
                            Master's course on-the-job special class</b></h1>
                    </span>
                    <ul class="d-flex ">
                        <li><a href="{{ route('en_home') }}" class="color-gray"> front page</a></li><span>></span>
                        <li><a href="{{ route('en_admissions', ['year' => '111學年度四技二專「甄選入學」招生選才內涵- 外語群英語類']) }}"
                                class="color-gray">Admissions</a></li>
                        <span>></span>
                        <li>Master's course on-the-job special class</li>

                    </ul>
                </div>
                <div class="col-12 mt-3">
                    @foreach ($mastercourses as $mastercourse)
                        {!! $mastercourse->link !!}
                    @endforeach
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
